<?php
/*
 Template Name: Home
*/
 ?>
 
 <?php get_header(); ?>

 <div id="content">

 	<div id="inner-content" class="cf">

 		<main class="c-main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

 			<section class="c-banner c-banner--slider">
 				<div class="swiper-container js-home-slider">
 					<div class="swiper-wrapper">
 						<?php
 						$args = array(
 							'post_type' => 'slider',
 							'order'     => 'DESC'
 						);

 						$query = new WP_Query( $args );

 						while( $query->have_posts() ) : $query->the_post(); ?>

							<div class="swiper-slide" style="background: url('<?php echo get_sub_field('image'); ?>');">

							</div>

 						<?php endwhile; wp_reset_postdata(); ?>
 					</div>
 					<div class="swiper-pagination"></div>
 				</div> 
 			</section>


 			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

 				<div class="c-home">

				</div>

 			<?php endwhile; endif; ?>

 		</main>

 	</div>

 </div>

 <?php get_footer(); ?>
