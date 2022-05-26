<?php
/*
 Template Name: Ofertas
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

 				<div class="c-offers">
          <div class="c-bg js-animated-start">
            <div class="o-wrapper o-wrapper--1140">
              <div class="c-offers__container">
                <ul class="c-offers__list">
                  <?php
                    $args = array(
                      'post_type'      => 'oferta',
                      'order'          => 'DESC',
                      'posts_per_page' => -1
                    );

                    $query = new WP_Query($args);
                    $count = 1;
                    while( $query->have_posts() ): $query->the_post();
                  ?>
                    
                    <li class="c-offers__item fade-in fade-in-right fade-in-time-<?php echo $count; ?>"><a class="js-search-offers" href="<?php echo $post->ID; ?>"><?php the_title(); ?></a></li>

                  <?php $count++; endwhile; wp_reset_postdata(); ?>
                </ul>

                <p class="fade-in fade-in-up">e muito mais perto de você!</p>
              </div>

              <p class="o-ttl--center"><?php echo get_field('text'); ?></p>

              <div class="c-offers__content js-container-ajax">
                <?php
                  $args = array(
                    'post_type'      => 'oferta',
                    'order'          => 'DESC',
                    'posts_per_page' => 1
                  );

                  $query = new WP_Query($args);

                  while( $query->have_posts() ): $query->the_post();
                ?>
                  
                  <?php echo get_field('pdf'); ?>

                <?php endwhile; ?>

                <div id="response"><img src="<?php echo get_template_directory_uri(); ?>/library/images/loading.gif"></div>
              </div>
            </div>
          </div>

          <?php $app = get_field('banner_app', 242); ?>
					<div class="c-banner--460 c-banner--app js-animated" style="background-image: url('<?php echo $app['image'] ?>');">
						<div class="c-home__content-app o-wrapper o-wrapper--1280">
							<div class="c-home__app fade-in fade-in-right">
								<img src="<?php echo $app['icon'] ?>">
								<span class="o-ttl--32">
									<?php echo $app['title'] ?>
								</span>
								<div class="c-home__app-img">
									<a href="<?php echo get_field('google_play_link', 242) ?>"><img src="<?php echo get_field('google_play', 242) ?>" width="184" height="54" alt="Google play"></a>
									<a href="<?php echo get_field('app_store_link', 242) ?>"><img src="<?php echo get_field('app_store', 242) ?>" width="184" height="54" alt="App store"></a>
								</div>
							</div>
						</div>
					</div>
				</div>

 			<?php endwhile; endif; ?>

 		</main>

 	</div>

 </div>

 <?php get_footer(); ?>
