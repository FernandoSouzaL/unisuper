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

        <div class="c-informative">

          <div class="o-wrapper o-wrapper--1280">
            <div class="c-informative__category">
              <h2 class="o-ttl--38 o-ttl--bold">Categorias:</h2>

              <ul>
                <?php 
                  $current = 'c-informative__current';
                  $compare = single_cat_title("", false);
                  $terms = get_terms( 'categorias', array(
                    'orderby'    => 'name',
                    'hide_empty' => 0
                  )); 
                  
                  foreach($terms as $term):
                    $name = $term->name;
                    $if = $name == $compare ? $current : '';
                ?>

                  <li>
                    <a class="o-ttl--13 o-ttl--gray <?php echo $if; ?>" href="<?php echo get_term_link($term); ?>">
                      <?php echo $name; ?>
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

              <?php endwhile; ?>
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
                <h2 class="o-ttl--38"><?php _e( 'Oops, post não encontrado!'); ?></h2>
              </header>
            </article>

          <?php endif; ?>
            
        </div>

      </main>

    </div>

  </div>

<?php get_footer(); ?>
