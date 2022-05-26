<?php
	include '../../../../../wp-load.php';

	switch ($_GET['acao']) {

		case 'busca_vagas':

			$post_id = $_POST["valueId"]; ?>

      <?php 
        $args = array(
          'post_type' => 'vagas',
          'order'     => 'DESC',
          'tax_query' => array(
            array(
                'taxonomy' => 'cidade',
                'field'    => 'slug',
                'terms'    => $post_id,
            ),
          ),
        ); 

        $query = new WP_Query($args);

        while( $query->have_posts() ): $query->the_post();
      ?>
          <?php $terms = get_the_terms( $post->ID, 'cidade' ); 
                $term = array_shift( $terms ); ?>

          <div class="c-work-us__item">
            <h3 class="o-ttl o-ttl--26 o-ttl--bold"><?php the_title(); ?> - <?php echo $term->name; ?></h3>
            <div class="c-work-us__content o-grid o-grid__col-2 o-grid__gap-60">
              <div>
                <p class="o-ttl--20">Horário de trabalho: <?php echo get_field('work_time'); ?></p>
                <p class="o-ttl--20">Local: <?php echo get_field('location'); ?></p>
              </div>

              <div>
                <p class="o-ttl--20">Setor: <?php echo get_field('sector'); ?></p>
                <p class="o-ttl--20">Pretensão salarial: <?php echo get_field('cash'); ?></p>
              </div>
            </div>
          </div>

      <?php endwhile; wp_reset_postdata(); ?>

	<?php	break;

		}
?>
