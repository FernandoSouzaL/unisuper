			<footer class="c-footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div class="c-news js-animated">
					<div class="o-wrapper o-wrapper--1140">
						<?php echo do_shortcode('[contact-form-7 id="251" title="News"]'); ?>
					</div>
				</div>

				<div class="o-wrapper o-wrapper--1280">

					<div class="c-footer__container">
						<svg width="197" height="99">
								<title><?php bloginfo( 'name' ); ?></title>
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#logotipo" />
						</svg>

						<?php wp_nav_menu(array('container' => '', 'container_class' => '', 'menu' => __( 'Footer Links', 'bonestheme' ), 'menu_class' => 'c-menu__footer', 'theme_location' => 'footer-links', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' => 0, 'fallback_cb' => 'bones_footer_links_fallback')); ?>
						
						<div class="c-footer__app">
							<?php $app = get_field('app', 34); ?>

							<img class="c-footer__app-img" src="<?php echo $app['logotipo'] ?>">

							<div class="c-footer__app-icons">
								<a class="c-footer__app-link" href="<?php echo $app['google_play_link']; ?>">
									<img src="<?php echo $app['google_play']; ?>" width="172" height="51">
								</a>

								<a class="c-footer__app-link" href="<?php echo $app['app_store_link']; ?>">
									<img src="<?php echo $app['app_store']; ?>" width="172" height="51">
								</a>
							</div>
						</div>
						
						<div class="c-footer__redes">
							<p class="o-ttl o-ttl--13 o-ttl--bold">Nossas redes:</p>
						
							<ul class="c-menu__redes">
								<?php echo get_template_part('partials/main-redes-menu'); ?>
							</ul>
						</div>
					</div>

					<div class="c-footer__payment">
						<p class="o-ttl--13 o-ttl--bold">Métodos de Pagamento:</p>

						<?php while( have_rows('payment', 34) ): the_row(); ?>

							<img src="<?php echo get_sub_field('image'); ?>" alt="<?php echo get_sub_field('name'); ?>" title="<?php echo get_sub_field('name'); ?>">

						<?php endwhile; wp_reset_postdata(); ?>
					</div>

					<div class="c-footer__content">
						<p class="c-footer__copyright o-ttl--13 o-ttl--center">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. Todos os direitos reservados. <a href="http://ondaweb.com.br" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/ondaweb-ico-black.png" /></a></p>
					</div>


				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php include get_template_directory() . '/partials/svgs.php' ?>

		<?php wp_footer(); ?>

		<div class="c-privacy-alert is-hidden">
			<div class="c-privacy-alert__container">
				<div class="o-wrapper o-wrapper--1280">
					<div class="c-privacy-alert__content">
						<p class="o-ttl--12">Usamos cookies para aprimorar sua experiência em nosso site e fins de publicidade. <a class="o-link" href="<?php echo get_permalink() ?>">Política de Privacidade</a></p>
						<div class="c-privacy-alert__content-flex">
							<a href="#" class="o-btn o-btn--primary js-close-alert"><span>Ignorar</span></a>
							<a href="#" class="o-btn o-btn--primary js-close-alert"><span>Aceito</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>

	</body>

</html> <!-- end of site. what a ride! -->
