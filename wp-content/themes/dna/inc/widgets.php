<?php
/**
 * registra widget para mostrar facebook
 * @author Vinicius de Santama
 */
class dna_face_widget extends WP_Widget {

  public function __construct(){
    parent::__construct(
      // widget ID
      'dna_face_widget',
      // widget name
      "Face Widget DNA",
      // widget description
      array( 'description' => __( 'DNAForMarketing face widget', 'dna_widget_domain' ), )
    );
  }

  public function form($instance) {
    $title = isset($instance[ 'title' ]) ? $instance[ 'title' ] : "FaceBook Feed";
    $faceUrl = isset($instance[ 'faceUrl' ]) ? $instance[ 'faceUrl' ] : "https://www.facebook.com/";
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Título</label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'faceUrl' ); ?>">Url do perfil do FaceBook</label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'faceUrl' ); ?>" name="<?php echo $this->get_field_name( 'faceUrl' ); ?>" type="text" value="<?php echo esc_attr( $faceUrl ); ?>" />
    </p>
    <?php
  }
  
  public function widget($args, $instance) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    echo $args['before_widget'];
    //if title is present
    echo $args['before_title'];
    if(empty($instance['title'])){
      echo("");
    } else{
      echo($instance['title']);
    }
    echo $args['after_title'];
    // facebook
    ?>
    <div 
      class="fb-page" 
      data-href="<?php echo($instance['faceUrl']); ?>"
      data-tabs="timeline" data-width="340" data-height="" 
      data-small-header="false" data-adapt-container-width="true" 
      data-hide-cover="false" data-show-facepile="false"
      >
      <blockquote cite="<?php echo($instance['faceUrl']); ?>" class="fb-xfbml-parse-ignore">
        <a href="<?php echo($instance['faceUrl']); ?>">Prestes Construtora e Incorporadora</a>
      </blockquote>
    </div>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" 
    src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v4.0"></script>
    <?php
    echo $args['after_widget'];
  }

  public function update($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['faceUrl'] = ( ! empty( $new_instance['faceUrl'] ) ) ? strip_tags( $new_instance['faceUrl'] ) : '';
    return $instance;
  }
}

/**
 * registra widget para mostrar facebook
 * @author Vinicius de Santama
 */
class dna_listaCategorias_widget extends WP_Widget {

  public function __construct(){
    parent::__construct(
      // widget ID
      'dna_listaCategorias_widget',
      // widget name
      "Lista das categorias do blog DNA",
      // widget description
      array( 'description' => __( 'DNAForMarketing  blog categorias', 'dna_widget_domain' ), )
    );
  }

  public function form($instance) {
    $title = isset($instance[ 'title' ]) ? $instance[ 'title' ] : "Categorias";
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Título</label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php
  }
  
  public function widget($args, $instance) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    echo $args['before_widget'];
    //if title is present
    echo $args['before_title'];
    if(empty($instance['title'])){
      echo("");
    } else{
      echo($instance['title']);
    }
    echo $args['after_title'];
    // corpo
    ?>
    <ul>
      <?php $categorias = get_categories(); foreach($categorias as $categoria): ?>
        <li><a href="<?php bloginfo('url');?>/category/<?php echo $categoria->slug; ?>/"><?php echo $categoria->name; ?></a></li>
      <?php endforeach; ?>
    </ul>
    <?php
    echo $args['after_widget'];
  }

  public function update($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
  }
}

/**
 * registra widget para mostrar facebook
 * @author Vinicius de Santama
 */
class dna_listaMaisVisitados_widget extends WP_Widget {

  public function __construct(){
    parent::__construct(
      // widget ID
      'dna_listaMaisVisitados_widget',
      // widget name
      "Lista os posts mais visitados do blog DNA",
      // widget description
      array( 'description' => __( 'DNAForMarketing mais visitados', 'dna_widget_domain' ), )
    );
  }

  public function form($instance) {
    $title = isset($instance[ 'title' ]) ? $instance[ 'title' ] : "Mais Visitados";
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Título</label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php
  }
  
  public function widget($args, $instance) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    echo $args['before_widget'];
    //if title is present
    echo $args['before_title'];
    if(empty($instance['title'])){
      echo("");
    } else{
      echo($instance['title']);
    }
    echo $args['after_title'];
    // corpo
    // WP_Query arguments
    $argsQuery = array(
      'post_type'   				=> array( 'post' ),
      'post_status' 				=> array( 'publish' ),
      'orderby'     				=> 'meta_value_num',
      'meta_key'    				=> 'post_views_count',
      'order'       	 			=> 'DESC',
      'ignore_sticky_posts' => 1,
      'posts_per_page' 			=> '4',
    );
    // The Query
    $query_trending = new WP_Query( $argsQuery ); 

    $count = 0;   
    // The Loop
    if ($query_trending->have_posts()){
      while ($query_trending->have_posts()){
        $query_trending->the_post(); $count ++;?>
        <a href="<?php the_permalink(); ?>">
          <div class="bp-mostvisited-row">
            <div class="bp-mostvisited-postimage col-3">
              <?php the_post_thumbnail('thumbnail', array('class' => 'w-100 d-block')); ?>              
            </div>
            <div class="bp-mostvisited-content col-9">
              <div class="bp-mostvisited-posttitle"><?php the_title(); ?></div>
              <div class="bp-mostvisited-postdate"><?php echo get_the_date( 'd/m/Y' ); ?></div>
            </div>
          </div>
        </a>
      <?php
      }
    }
    echo $args['after_widget'];
    wp_reset_postdata();
  }

  public function update($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
  }
}

/**
 * registra widget para mostrar facebook
 * @author Vinicius de Santama
 */
class dna_pesquisaBlog_widget extends WP_Widget {

  public function __construct(){
    parent::__construct(
      // widget ID
      'dna_pesquisaBlog_widget',
      // widget name
      "Pesquisa no blog DNA",
      // widget description
      array( 'description' => __( 'DNAForMarketing pesquisa no blog', 'dna_widget_domain' ), )
    );
  }

  public function form($instance) {}
  
  public function widget($args, $instance) {
    ?>
    <div class="col-md-12 col-sm-12">
      <div class="input-field">
        <form id="search-in-blog" class="line-focused" action="<?php echo get_home_url() ?>">
          <input type="text" placeholder="Pesquisar no blog" id="s-input"  name="s">
          <div class="blockPress-btn">
            <a class="bttn" ><input type="submit" id="search" value="Pesquisar" /></a>
          </div>
        </form>
      </div>
    </div>
    <?php
  }

  public function update($new_instance, $old_instance) {}
}

/**
 * função para o registro dos widgets
 * @author Vinicius de Santana
 */
function dna_register_widget() {
  register_widget('dna_face_widget');
  register_widget('dna_listaCategorias_widget');
  register_widget('dna_listaMaisVisitados_widget');
  register_widget('dna_pesquisaBlog_widget');
}

add_action( 'widgets_init', 'dna_register_widget' );