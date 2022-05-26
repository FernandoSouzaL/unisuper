<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">

					<main class="c-main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

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

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

              <div class="c-single-informative">
                <div class="c-bg">
                  <div class="o-wrapper o-wrapper--1140">
                    <div class="c-single-informative__container">
                      <div class="c-single-informative__left">
                        <?php dynamic_sidebar('sidebar1'); ?>
  
                        <div class="c-single-informative__date">
                          <h3 class="o-ttl--13 o-ttl--bold">Publicado em:</h3>
                          <p><?php echo get_the_date('d/m/Y'); ?></p>
                        </div>
                      </div>
                    
                      <div class="c-single-informative__right">
                        <?php echo get_field('text'); ?>
                        
                        <div class="c-single-informative__footer">
                          <div class="c-single-informative__underline"></div>
                          <p>Publicado em <?php echo get_the_date('d/m/Y'); ?></p>
                          <hr>
                          <div class="c-single-informative__footer-col-2">
                            <a href="javascript:window.history.go(-1)" class="o-ttl--13 o-ttl--bold">< Voltar</a> 

                            <?php get_sidebar('sidebar1'); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
						  	

						<?php endwhile; ?>

            <div class="c-bg">
              <div class="o-wrapper o-wrapper--1140">
                <div class="c-single-informative__view-more">
                  <div class="swiper-container js-slider-view-more">
                    <div class="swiper-wrapper">
                      <?php
                        $args = array(
                          'post_type'      => 'informativo',
                          'order'          => 'DESC',
                          'orderby'        => 'rand',
                          'posts_per_page' => -1,
                          'post__not_in'   => array($post->ID)
                        );

                        $query = new WP_Query($args);

                        while( $query->have_posts() ): $query->the_post();
                      ?>
                        <div class="swiper-slide">
                          <div class="c-informative__block c-informative__block--secondary">
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
                        </div>

                        <?php endwhile; wp_reset_postdata(); ?>

                    </div>
                    <div class="swiper-pagination swiper-pagination--secondary swiper-pagination--gray"></div>
                  </div>
                </div>
              </div>
            </div>

            <?php $bannerWhats = get_field('banner_whats', 178); ?>
            <div class="c-banner c-banner--whats">
              <div class="c-banner__whats">
                <div class="c-banner__whats-title">
                  <?php echo $bannerWhats['title']; ?>
                  <p class="o-ttl--38 o-ttl--bold o-ttl--light-green">
                    <svg width="33" height="33">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#whatsapp" />
                    </svg>
                    <?php echo $bannerWhats['telphone']; ?>
                  </p>

                  <a href="<?php echo $bannerWhats['link']; ?>" class="o-btn o-btn--primary"><span>Acessar</span></a>
                </div>

                <div class="c-banner__whats-img">
                  <img src="<?php echo $bannerWhats['image']; ?>">
                </div>
              </div>
            </div>

						<?php else : ?>

							<article id="post-not-found" class="hentry cf">
									<header class="article-header">
										<h1><?php _e( 'Oops, post não encontrado!', 'bonestheme' ); ?></h1>
									</header>
							</article>

						<?php endif; ?>

					</main>

					<?php //get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
