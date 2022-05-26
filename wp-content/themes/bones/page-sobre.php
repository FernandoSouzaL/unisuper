<?php
/*
 Template Name: Sobre
*/
 ?>
 
 <?php get_header(); ?>

 <div id="content">

 	<div id="inner-content" class="cf">

 		<main class="c-main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

      <?php $banner = get_field('banner'); ?>
 			<section class="c-banner c-banner--page js-animated-start" style="background: url('<?php echo $banner['image'] ?>');">
 				<div class="c-banner__content o-wrapper o-wrapper--1140">
           <div class="c-banner__txt fade-in fade-in-right">
             <h2 class="o-ttl o-ttl--50 o-ttl--white o-ttl--bold"><?php echo $banner['title'] ?></h2>
             <p class="o-ttl o-ttl--38 o-ttl--white"><?php echo $banner['description'] ?></p>
           </div>
        </div>
 			</section>


 			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

 				<div class="c-about">
          <div class="o-wrapper o-wrapper--1280 js-animated">
            <?php $count = 1; while( have_rows('text_image') ): the_row(); ?>
              
              <div class="c-about__block">
                <div class="c-about__img fade-in fade-in-right fade-in-time-<?php echo $count; ?>">
                  <img src="<?php echo get_sub_field('image'); ?>">
                </div>

                <div class="c-about__txt fade-in fade-in-up fade-in-time-<?php echo $count; ?>">
                  <?php echo get_sub_field('text'); ?>
                </div>
              </div>

            <?php $count++; endwhile; wp_reset_postdata(); ?>
          </div>

          <div class="o-wrapper o-wrapper--790 js-animated">
            <?php $messege = get_field('messege'); ?>
            <div class="c-about__messege fade-in fade-in-up">
              <img src="<?php echo get_template_directory_uri(); ?>/library/images/messege.svg">
              <h3 class="o-ttl--20 o-ttl--medium o-ttl--italic"><?php echo $messege['text']; ?></h3>
              <span class="c-about__underline"></span>
              <p class="o-ttl--bold"><?php echo $messege['author']; ?></p>
            </div>
          </div>

          <div class="c-bg c-bg--gray js-animated">
            <div class="o-wrapper o-wrapper--1280">
              <h2 class="o-ttl o-ttl--38 o-ttl--bold o-ttl--center fade-in fade-in-down">Nossos valores</h2>

              <div class="c-about__container o-grid o-grid__col-6 o-grid__gap-70">
                <?php $count = 1; while( have_rows('values') ): the_row(); ?>

                  <div class="fade-in fade-in-right fade-in-time-<?php echo $count; ?>">
                    <div class="c-about__values">
                      <div class="c-about__values-img">
                        <img class="c-icon" src="<?php echo get_sub_field('icon'); ?>">
                      </div>

                      <h3 class="o-ttl--16 o-ttl--bold o-ttl--center"><?php echo get_sub_field('title'); ?></h3>
                    </div>
                  </div>

                <?php $count++; endwhile; wp_reset_postdata(); ?>
              </div>
            </div>
          </div>
				</div>

 			<?php endwhile; endif; ?>

 		</main>

 	</div>

 </div>

 <?php get_footer(); ?>
