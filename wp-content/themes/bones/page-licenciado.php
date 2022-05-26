<?php
/*
 Template Name: Licenciado
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

 				<div class="c-licensed">
          <div class="o-wrapper o-wrapper--1140 js-animated">
            <div class="c-licensed__block">
              <div class="c-licensed__txt fade-in fade-in-right">
                <h2 class="o-ttl o-ttl--38 o-ttl--bold"><?php echo get_field('title'); ?></h2>
                <?php echo get_field('description'); ?>
              </div>

              <div class="c-licensed__content-form fade-in fade-in-up">
                <div class="c-licensed__form">
                  <?php echo do_shortcode('[contact-form-7 id="153" title="Quero ser um Licenciado"]'); ?>
                </div>
              </div>
            </div>
          </div>

          <div class="c-banner c-banner--430 js-animated">
            <div class="o-wrapper o-wrapper--1000">
              <h2 class="o-ttl o-ttl--38 o-ttl--bold o-ttl--center o-ttl--white fade-in fade-in-down">Layout de Loja</h2>
              <span class="o-ttl--white fade-in fade-in-right"><?php echo get_field('text'); ?></span>
            </div>
          </div>
          
          <div class="o-wrapper o-wrapper--1280">
            <div class="swiper-container c-licensed__slider js-slider-layout">
              <div class="swiper-wrapper">
                <?php while( have_rows('layout') ): the_row(); ?>
                
                  <div class="swiper-slide">
                    <div class="c-licensed__item">
                      <div class="c-licensed__item-img">
                        <img src="<?php echo get_sub_field('icon'); ?>">
                      </div>

                      <div class="c-licensed__item-txt">
                        <h3 class="o-ttl o-ttl--28 o-ttl--bold"><?php echo get_sub_field('title'); ?></h3>
                        <?php echo get_sub_field('text'); ?>
                      </div>
                    </div>
                  </div>
      
                <?php endwhile; wp_reset_postdata(); ?>
              </div>
              <div class="swiper-pagination swiper-pagination--secondary"></div>
            </div>
          </div>
          
				</div>

 			<?php endwhile; endif; ?>

 		</main>

 	</div>

 </div>

 <?php get_footer(); ?>
