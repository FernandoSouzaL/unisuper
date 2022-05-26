<?php get_header(); ?>

	<div id="content">

		<div id="inner-content" class="cf">

			<main class="c-main" role="main">

				<?php $banner = get_field('banner', 14); ?>
        <section class="c-banner c-banner--400 js-animated-start" style="background: url('<?php echo $banner['image'] ?>');">
          <div class="c-banner__content o-wrapper o-wrapper--1140">
            <div class="c-banner__txt fade-in fade-in-right">
              <h2 class="o-ttl o-ttl--50 o-ttl--white o-ttl--bold"><?php echo $banner['title'] ?></h2>
              <?php if (!empty($banner['description'])): ?>
                <p class="o-ttl o-ttl--38 o-ttl--white"><?php echo $banner['description'] ?></p>
              <?php endif; ?>
            </div>
          </div>
        </section>

				<div class="o-wrapper o-wrapper--1280">
					<div class="c-informative__category">
						<h2 class="o-ttl--38 o-ttl--bold">Categorias:</h2>

						<ul>
							<?php 
								$terms = get_terms( 'categorias', array(
									'orderby'    => 'name',
									'hide_empty' => 0
								)); 

								foreach($terms as $term):
							?>

								<li>
									<a class="o-ttl--13 o-ttl--gray" href="<?php echo get_term_link($term); ?>">
										<?php echo $term->name; ?>
									</a>
								</li>

							<?php endforeach; ?>
						</ul>

						<div class="c-informative__search">
							<?php echo get_template_part('searchform'); ?>
						</div>
					</div>
				</div>

				<div class="c-informative__container c-bg">
					<div class="o-wrapper o-wrapper--1140">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<div class="c-informative__block">
								<div class="c-informative__img">
									<img src="<?php echo get_field('image'); ?>">
								</div>

								<a href="<?php echo get_permalink(); ?>">
									<div class="c-informative__txt">
										<h3 class="o-ttl o-ttl--26 o-ttl--bold"><?php the_title(); ?></h3>
										<p><?php echo get_field('description'); ?></p>

										<div class="c-informative__btn">
											<span class="o-ttl--13 o-ttl--bold">Ler mais</span>
										</div>
									</div>
								</a>
							</div>

						<?php endwhile; bones_page_navi(); ?>

						<?php else: ?>

							<article id="post-not-found" class="hentry cf">
								<header class="article-header">
									<h1><?php _e( 'Desculpe, sem resultados.'); ?></h1>
								</header>
								<section class="entry-content">
									<p><?php _e( 'Tente buscar por outro termo.'); ?></p>
								</section>
							</article>
							
						<?php endif; ?>
					</div>
				</div>

			</main>

		</div>

	</div>

<?php get_footer(); ?>
