<?php
/*
 Template Name: Trabalhe Conosco
*/
 ?>
 
 <?php get_header(); ?>

 <div id="content">

 	<div id="inner-content" class="cf">

 		<main class="c-main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

      <?php $banner = get_field('banner'); ?>
 			<section class="c-banner c-banner--400 js-animated-start" style="background: url('<?php echo $banner['image'] ?>');">
 				<div class="c-banner__content o-wrapper o-wrapper--1140">
           <div class="c-banner__txt fade-in fade-in-right">
             <h2 class="o-ttl o-ttl--50 o-ttl--white o-ttl--bold"><?php echo $banner['title'] ?></h2>
             <p class="o-ttl o-ttl--38 o-ttl--white"><?php echo $banner['description'] ?></p>
           </div>
        </div>
 			</section>


 			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

 				<div class="c-work-us">
          <div class="c-bg js-animated">
            <div class="o-wrapper o-wrapper--1140 o-grid o-grid__col-2 o-grid__gap-130">
              <div class="c-work-us__register fade-in fade-in-right">
                <h2 class="o-ttl o-ttl--38 o-ttl--bold"><?php echo get_field('title'); ?></h2>
                <p>
                  <?php echo get_field('text'); ?>
                </p>

                <a href="<?php echo get_field('link_button'); ?>" class="o-btn o-btn--primary o-btn--100"><span>Cadastre-se</span></a>
              </div>
            </div>
          </div>

          <div class="c-bg c-bg--gray js-animated">
            <div class="o-wrapper o-wrapper--1140">
              <h2 class="o-ttl o-ttl--38 o-ttl--bold fade-in fade-in-down">Vagas disponíveis</h2>

              <select class="c-work-us__select o-input o-input--select js-search-vacancies fade-in fade-in-right">
                <option value="" selected disabled>Todos os locais</option>

                <?php 
                  $terms = get_terms( 'cidade', array(
                    'orderby'    => 'name',
                    'hide_empty' => 0
                  )); 

                  foreach($terms as $term):
                ?>
                  <option value="<?php echo $term->slug ?>"><?php echo $term->name ?></option>

                <?php endforeach; ?>
              </select>

              <div class="c-work-us__container js-container-ajax">
                <?php 
                  $args = array(
                    'post_type' => 'vagas',
                    'order'     => 'DESC',
                    'tax_query' => array(
                      array(
                          'taxonomy' => 'destaque',
                          'field'    => 'slug',
                          'terms'    => 'destaques',
                      ),
                    ),
                  ); 

                  $query = new WP_Query($args);
                  $count = 1;
                  while( $query->have_posts() ): $query->the_post();
                ?>
                    <?php $terms = get_the_terms( $post->ID, 'cidade' ); 
                          $term = array_shift( $terms ); ?>

                    <div class="c-work-us__item fade-in fade-in-right fade-in-time-<?php echo $count; ?>">
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

                <?php $count++; endwhile; wp_reset_postdata(); ?>

                <div id="response"><img src="<?php echo get_template_directory_uri(); ?>/library/images/loading.gif"></div>
              </div>
              
            </div>
          </div>
          
				</div>

 			<?php endwhile; endif; ?>

 		</main>

 	</div>

 </div>

 <?php get_footer(); ?>
