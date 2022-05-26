<?php
/*
 Template Name: Lojas
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
              <?php if (!empty($banner['description'])): ?>
                <p class="o-ttl o-ttl--38 o-ttl--white"><?php echo $banner['description'] ?></p>
              <?php endif; ?>
           </div>
        </div>
 			</section>


 			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

 				<div class="c-shop">
          <div class="c-bg js-animated">
            <div class="o-wrapper o-wrapper--1280">
              <div class="c-shop__header">
                <h2 class="o-ttl o-ttl--38 o-ttl--bold">Localize um mercado UniSuper</h2>

                <select class="c-shop__select o-input o-input--gray o-input--select js-search-shops">
                  <option value="" selected disabled>Selecione a cidade</option>

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
              </div>

              <div class="js-container-ajax">
                <?php echo do_shortcode('[ajax_load_more css_classes="c-shop__loadmore" post_type="loja" posts_per_page="6" images_loaded="true" max_pages="6"]');?>

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
