<?php
/*
 Template Name: Home
*/
 ?>
 
 <?php get_header(); ?>

 <div id="content">

 	<div id="inner-content" class="cf">

 		<main class="c-main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

 			<section class="c-banner--slider">
 				<div class="swiper-container js-home-slider">
 					<div class="swiper-wrapper">
 						<?php	while( have_rows('slider') ) : the_row(); ?>

							<div class="swiper-slide">
								<picture>
									<source srcset="<?php echo get_sub_field('image_mobile'); ?>" media="(max-width: 425px)">
									<img src="<?php echo get_sub_field('image_desktop'); ?>">
								</picture>
							</div>

 						<?php endwhile; wp_reset_postdata(); ?>
 					</div>
 					<div class="swiper-pagination"></div>
					<div class="button-next">
					<svg width="18" height="34">
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-left" />
					</svg>
					</div>
      		<div class="button-prev">
						<svg width="18" height="34">
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-left" />
						</svg>
					</div>
 				</div> 
 			</section>


 			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

 				<div class="c-home">
					<div class="o-grid o-grid__col-2 js-animated-start">
						<?php $offers = get_field('offers'); ?>
						<div class="c-home__block c-banner c-banner--615" style="background: url('<?php echo $offers['image']; ?>');">
							<div class="fade-in fade-in-right">
								<h3 class="o-ttl o-ttl--13 o-ttl--white o-ttl--bold"><?php echo $offers['hashtag']; ?></h3>
								<h2 class="o-ttl o-ttl--38 o-ttl--white o-ttl--bold"><?php echo $offers['title']; ?></h2>
								<p class="o-ttl--white"><?php echo $offers['description']; ?></p>
								<a class="o-btn o-btn--primary" href="<?php echo $offers['link']; ?>"><span>Confira</span></a>
							</div>
						</div>
						<?php
							$args = array(
								'post_type' 		 => 'informativo',
								'posts_per_page' => 1,
								'order'					 => 'DESC',
								'tax_query'			 => array(
									array(
										'taxonomy' => 'destaque',
										'field'    => 'slug',
										'terms'    => 'destaques',
									),
								),
							);

							$query = new WP_Query($args);

							while( $query->have_posts() ): $query->the_post();
						?>

							<div class="c-home__block c-home__block--secondary c-banner c-banner--615" style="background: url('<?php echo get_field('image'); ?>');">
								<div class="fade-in fade-in-right">
									<?php $terms = wp_get_post_terms( $post->ID, 'categorias' ); 
												if(!empty($terms)): 
													$term = array_shift( $terms ); ?>
													<h3 class="o-ttl o-ttl--13 o-ttl--bold o-ttl--white"><?php echo $term->name; ?></h3>
												<?php endif; ?>

									<h2 class="o-ttl o-ttl--38 o-ttl--bold o-ttl--white"><?php the_title(); ?></h2>
									<p class="o-ttl--white">Publicado em: <?php echo get_the_date('d/m/Y'); ?></p>
									<a class="o-btn o-btn--primary" href="<?php echo get_permalink(); ?>"><span>Leia mais</span></a>
								</div>
							</div>

						<?php endwhile; wp_reset_postdata(); ?>
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

					<div class="o-grid o-grid__col-2 js-animated">
						<?php $count = 1; while( have_rows('info') ): the_row(); ?>

							<div class="c-home__block c-banner c-banner--615" style="background: url('<?php echo get_sub_field('image'); ?>');">
								<div class="fade-in fade-in-right fade-in-time-<?php echo $count; ?>">
									<h2 class="o-ttl o-ttl--38 o-ttl--white o-ttl--bold"><?php echo get_sub_field('title'); ?></h2>
									<p class="o-ttl--white"><?php echo get_sub_field('description'); ?></p>
									<a class="o-btn o-btn--primary" href="<?php echo get_sub_field('button_link'); ?>"><span><?php echo get_sub_field('button_title'); ?></span></a>
								</div>
							</div>
						
						<?php $count++; endwhile; wp_reset_postdata(); ?>
					</div>

					<?php $card = get_field('card'); ?>
					<div class="c-banner c-banner--460 c-banner--card js-animated" style="background-image: url('<?php echo get_template_directory_uri(); ?>/library/images/bg-green.svg');">
						<div class="c-home__content-card o-wrapper o-wrapper--1140">
							<div class="o-grid o-grid__col-2 o-grid__gap-130">
								<img src="<?php echo $card['image'] ?>" class="fade-in fade-in-right">

								<span class="o-ttl--32 fade-in fade-in-down">
									<?php echo $card['title'] ?>
									<a class="o-btn o-btn--primary" href="<?php echo $card['link']; ?>"><span>Seu Cartão</span></a>
								</span>
							</div>
						</div>
					</div>
				</div>

 			<?php endwhile; endif; ?>

 		</main>

 	</div>

 </div>

 <?php get_footer(); ?>
