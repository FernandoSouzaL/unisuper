<?php
/*
 Template Name: App
*/
 ?>
 
 <?php get_header(); ?>

 <div id="content">

 	<div id="inner-content" class="cf">

 		<main class="c-main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

       <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
       
       <div class="c-app">
          <?php $app = get_field('banner_app'); ?>
          <div class="c-banner--460 c-banner--app js-animated-start" style="background-image: url('<?php echo $app['image'] ?>');">
            <div class="c-app__container o-wrapper o-wrapper--1280">
              <div class="c-app__content fade-in fade-in-right">
                <img src="<?php echo $app['icon'] ?>">
                <span class="o-ttl--32">
                  <?php echo $app['title'] ?>
                </span>
              </div>
            </div>
          </div>

          <div class="c-bg">
            <div class="o-wrapper o-wrapper--1140 js-animated">
              <?php $count = 1; while( have_rows('app_repeater') ): the_row(); ?>

                <div class="c-app__block fade-in fade-in-right fade-in-time-<?php echo $count; ?>">
                  <h2 class="o-ttl o-ttl--38 o-ttl--bold"><?php echo get_sub_field('title'); ?></h2>
                  <p><?php echo get_sub_field('text'); ?></p>
                </div>

              <?php $count++; endwhile; wp_reset_postdata(); ?>
            </div>
          </div>

          <div class="o-wrapper o-wrapper--1140 js-animated">
            <h2 class="o-ttl--38 o-ttl--bold o-ttl--center fade-in fade-in-down"><?php echo get_field('title_app'); ?></h2>
            
            <div class="c-app__img fade-in fade-in-right">
              <a href="<?php echo get_field('google_play_link') ?>"><img src="<?php echo get_field('google_play') ?>" width="334" height="99" alt="Google play"></a>
              <a href="<?php echo get_field('app_store_link') ?>"><img src="<?php echo get_field('app_store') ?>" width="334" height="99" alt="App store"></a>
            </div>
          </div>
				</div>

 			<?php endwhile; endif; ?>

 		</main>

 	</div>

 </div>

 <?php get_footer(); ?>
