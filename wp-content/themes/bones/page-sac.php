<?php
/*
 Template Name: Sac
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

 				<div class="c-sac">
          <div class="o-wrapper o-wrapper--1140 js-animated">
            <div class="c-sac__block">
              <div class="c-sac__txt fade-in fade-in-right">
                <h2 class="o-ttl o-ttl--38 o-ttl--bold"><?php echo get_field('title'); ?></h2>
                <?php echo get_field('text'); ?>
                <p>
                  <a class="c-sac__contact o-ttl--20 o-ttl--bold" href="tel:<?php echo get_field('telphone'); ?>">
                    <svg class="c-sac__svg" width="19" height="19">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#telphone" />
                    </svg>
                    <?php echo get_field('telphone'); ?>
                  </a>
                </p>
                <p>
                  <a class="c-sac__contact o-ttl--20 o-ttl--bold" href="mailto:<?php echo get_field('e-mail'); ?>">
                    <svg class="c-sac__svg" width="22" height="16">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#email" />
                    </svg>
                    <?php echo get_field('e-mail'); ?>
                  </a>
                </p>
              </div>
            </div>
          </div>

          <?php $bannerWhats = get_field('banner_whats', 178); ?>
          <div class="c-banner c-banner--whats js-animated">
            <div class="c-banner__whats">
              <div class="c-banner__whats-title fade-in fade-in-right">
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
          
				</div>

 			<?php endwhile; endif; ?>

 		</main>

 	</div>

 </div>

 <?php get_footer(); ?>
