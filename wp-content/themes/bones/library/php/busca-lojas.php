<?php
	include '../../../../../wp-load.php';

	switch ($_GET['acao']) {

		case 'busca_lojas':

			$post_id = $_POST["valueId"]; ?>

      <?php 
        $args = array(
          'post_type' => 'loja',
          'order'     => 'DESC',
          'tax_query' => array(
            array(
                'taxonomy' => 'cidade',
                'field'    => 'slug',
                'terms'    => $post_id,
            ),
          ),
        ); 

        $query = new WP_Query($args); ?>

        <div class="c-shop__container o-grid o-grid__col-3 o-grid__gap-20">
          <?php while( $query->have_posts() ): $query->the_post(); ?>

            <div class="c-shop__item">
              <div class="c-shop__img">
                <img src="<?php echo get_field('image'); ?>">
              </div>
              <div class="c-shop__txt">
                <?php $terms = get_the_terms( $post->ID, 'cidade' ); 
                      $term = array_shift( $terms ); ?>
                <h2 class="o-ttl--20"><?php the_title(); ?> - <?php echo $term->name; ?></h2>
  
                <p class="c-shop__icon">
                  <svg width="20" height="20">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#pin" />
                  </svg>
                  <?php echo get_field('street'); ?>
                </p>
  
                <p class="c-shop__icon">
                  <svg width="20" height="20" style="color: #009A4D;">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#telphone" />
                  </svg>
                  <?php echo get_field('telphones'); ?>
                </p>
  
                <p class="c-shop__icon">
                  <svg width="20" height="20">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#whatsapp2" />
                  </svg>
                  <?php echo get_field('whastsapp'); ?>
                </p>
  
                <h3 class="o-ttl--medium o-ttl--16">Horário de Atendimento</h3>
  
                <p>
                  <?php echo get_field('open_time'); ?>
                </p>
              </div>
            </div>
  
          <?php endwhile; wp_reset_postdata(); ?>
        </div>

	<?php	break;

		}
?>
