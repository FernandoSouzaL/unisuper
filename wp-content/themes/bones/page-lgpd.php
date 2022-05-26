<?php
/*
 Template Name: Lgpd
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

 				<div class="c-lgpd">
          <div class="c-bg js-animated">
            <div class="o-wrapper o-wrapper--1140">
              <?php while( have_rows('lgpd') ): the_row(); ?>

                <div class="c-lgpd__block fade-in fade-in-right">
                  <h2 class="o-ttl o-ttl--38 o-ttl--bold"><?php echo get_sub_field('title'); ?></h2>
                  <p><?php echo get_sub_field('text'); ?></p>
                </div>

              <?php endwhile; ?>
            </div>
          </div>
				</div>

 			<?php endwhile; endif; ?>

 		</main>

 	</div>

 </div>

 <?php get_footer(); ?>
