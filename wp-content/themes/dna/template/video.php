<section id="video-area">
    <div class="container">
        <div class="row">
            <div id="info">
                <div id="bg-captions">
                    <h3>Conheça a história de quem já realizou o sonho da casa própria.</h3>
                    <h2>A sua pode ser a próxima</h2>
                </div>
                <div id="bg-button-play">
                    <a href="#!" data-toggle="modal" data-target=".bd-example-modal-xl">
                        <?php echo file_get_contents("wp-content/themes/dna/svg/play-button.svg"); ?></a>
                    <p>Assista o vídeo</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <iframe width="100%" height="515" src="https://www.youtube.com/embed/wN211BlNv5g" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</section>