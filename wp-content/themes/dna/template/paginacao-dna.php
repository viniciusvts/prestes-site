
<!--paginação-->
<?php
    $isFirstPage = (!isset( $_GET['sheet']) || $_GET['sheet'] == '1');
    $isLastPage = isset($_GET['sheet']) ? ($wp_query->max_num_pages == $_GET['sheet']) : false;
?>
<div class="row">
    <div class="col-12 col-lg previous-link">
        <?php $prevLink = get_prevs_page_link();
        if($prevLink){;
        ?>
        <div class="blockPress-btn m-0 p-0 d-flex">
            <a href="<?php echo ($prevLink); ?>"
            rel="prev"
            class="bttn-l mr-auto">Anterior</a>
        </div>
        <?php } ?>
    </div>
    <div class="col-12 col-lg page-inf text-center align-self-center">
        <?php
        if($wp_query->max_num_pages > 0){
            if (!$isFirstPage){
                $URI_ATUAL = "$_SERVER[REQUEST_URI]";
                $paramURL = "sheet=";
                $lastPage = str_replace($paramURL.$_GET['sheet'], $paramURL.'1', $URI_ATUAL);
            ?>
                <a href="<?php echo get_bloginfo('url').$lastPage; ?>"
                rel="prev"
                class="mx-2">
                    <<
                </a>
            <?php
            }
            if($isLastPage){
                $pageprev4 = get_prevs_page_link(4);
                if ($pageprev4){
                ?>
                    <a href="<?php echo $pageprev4; ?>"
                    rel="prev"
                    class="mx-2">
                        <?php echo($_GET['sheet'] - 4); ?>
                    </a>
                <?php
                }
                $pageprev3 = get_prevs_page_link(3);
                if ($pageprev3){
                ?>
                    <a href="<?php echo $pageprev3; ?>"
                    rel="prev"
                    class="mx-2">
                        <?php echo($_GET['sheet'] - 3); ?>
                    </a>
                <?php
                }
            }
            $pageprev2 = get_prevs_page_link(2);
            if ($pageprev2){
            ?>
                <a href="<?php echo $pageprev2; ?>"
                rel="prev"
                class="mx-2">
                    <?php echo($_GET['sheet'] - 2); ?>
                </a>
            <?php
            }
            $pageprev1 = get_prevs_page_link(1);
            if ($pageprev1){
            ?>
                <a href="<?php echo $pageprev1; ?>"
                rel="prev"
                class="mx-2">
                    <?php echo($_GET['sheet'] - 1); ?>
                </a>
            <?php
            }
            ?>
            <a href="#_" class="mx-2 text-black-50">
                <?php echo(isset($_GET['sheet'])?$_GET['sheet']:1); ?>
            </a>
            <?php
            $pagenext1 = get_nexts_page_link(1);
            if ($pagenext1){
            ?>
                <a href="<?php echo $pagenext1; ?>"
                rel="next"
                class="mx-2">
                    <?php echo(isset($_GET['sheet'])?($_GET['sheet'] + 1):2); ?>
                </a>
            <?php
            }
            $pagenext2 = get_nexts_page_link(2);
            if ($pagenext2){
            ?>
                <a href="<?php echo $pagenext2; ?>"
                rel="next"
                class="mx-2">
                    <?php echo(isset($_GET['sheet'])?($_GET['sheet'] + 2):3); ?>
                </a>
            <?php
            }
            if($isFirstPage){
                $pagenext3 = get_nexts_page_link(3);
                if ($pagenext3){
                ?>
                    <a href="<?php echo $pagenext3; ?>"
                    rel="next"
                    class="mx-2">
                        <?php echo(isset($_GET['sheet'])?($_GET['sheet'] + 3):4); ?>
                    </a>
                <?php
                }
                $pagenext4 = get_nexts_page_link(4);
                if ($pagenext4){
                ?>
                    <a href="<?php echo $pagenext4; ?>"
                    rel="next"
                    class="mx-2">
                        <?php echo(isset($_GET['sheet'])?($_GET['sheet'] + 4):5); ?>
                    </a>
                <?php
                }
                $pagenext5 = get_nexts_page_link(5);
                if ($pagenext5){
                ?>
                    <a href="<?php echo $pagenext5; ?>"
                    rel="next"
                    class="mx-2">
                        <?php echo(isset($_GET['sheet'])?($_GET['sheet'] + 5):6); ?>
                    </a>
                <?php
                }
            }
            if (!$isLastPage && $pagenext1){
                $URI_ATUAL = "$_SERVER[REQUEST_URI]";
                $paramURL = "sheet=";
                $lastPage = '';
                if (isset($_GET['sheet'])){
                    $lastPage = str_replace($paramURL.$_GET['sheet'], $paramURL.$wp_query->max_num_pages, $URI_ATUAL);
                } else {
                    $lastPage = $URI_ATUAL.'?'.$paramURL.$wp_query->max_num_pages;
                }
            ?>
                <a href="<?php echo get_bloginfo('url').$lastPage; ?>"
                rel="next"
                class="mx-2">
                    >>
                </a>
            <?php
            }
            ?>
        <?php
        }
        ?>
    </div>
    <div class="col-12 col-lg next-link">
        <?php $nextLink = get_nexts_page_link();
        if($nextLink){;
        ?>
            <div class="blockPress-btn m-0 p-0 d-flex">
                <a href="<?php echo ($nextLink); ?>"
                rel="next"
                class="bttn ml-auto">Próximo</a>
            </div>
        <?php } ?>
    </div>
</div>
<!--fim paginação-->