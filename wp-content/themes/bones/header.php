<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>
		<meta name="author" content="Ondaweb - www.ondaweb.com.br" />

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>


		<!-- Link Validate/Masked Input-->
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/jquery.validate.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/jquery.maskedinput.js"></script>
				
		<!-- bxSlider -->
		<script src="<?php echo get_template_directory_uri(); ?>/library/bxslider/jquery.bxslider.min.js"></script>
		<link href="<?php echo get_template_directory_uri(); ?>/library/bxslider/jquery.bxslider.css" rel="stylesheet" />

		<!-- swipper -->
		<script src="<?php echo get_template_directory_uri(); ?>/library/swiper/dist/js/swiper.min.js"></script>
		
		<!-- Add fancyBox -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

		<div id="container">

			<header class="c-header js-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

				<div class="o-wrapper o-wrapper--1280">
					<div class="c-header__container">
		
						<p class="c-header__logo" class="h1" itemscope itemtype="http://schema.org/Organization">
							<a href="<?php echo home_url(); ?>" rel="nofollow">
								<svg width="184" height="63">
									<title><?php bloginfo( 'name' ); ?></title>
									<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#logotipo" />
								</svg>
							</a>
						</p>
		
						<div class="c-menu">
		
							<div class="c-menu__container">
								<div class="c-menu__close js-active-menu"></div>

								<ul class="c-menu__main">
									<?php echo get_template_part('partials/main-itens-menu'); ?>
								</ul>
								<ul class="c-menu__redes">
									<?php echo get_template_part('partials/main-redes-menu'); ?>
								</ul>
							</div>

							<div class="c-menu__hamburguer js-active-menu">
								<span></span>
							</div>

							<div class="c-menu__lang">
								<div class="c-menu__lang-btn js-lang">
									<svg width="30" height="30">
										<title>Pt-br</title>
										<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#Pt-br" />
									</svg> 
								</div>

								<ul class="c-menu__lang-container">
									<?php echo get_template_part('partials/main-lang-menu'); ?>
								</ul>
							</div>
							
						</div>
		
					</div>
				</div>

			</header>
