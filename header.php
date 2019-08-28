<!DOCTYPE HTML>
<!--
	Arcana by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="<?php echo get_bloginfo('template_directory'); ?>/js/ie/html5shiv.js"></script><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/css/ie9.css" /><![endif]-->
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
    <?php wp_head();?>
	</head>
	<body>
		<div id="page-wrapper">
			<div class="header flex-wrapper">
				<div class="header-container flex-wrapper">
					<div id="logo">
	          <a href="<?php echo get_bloginfo( 'wpurl' );?>">
							<?php
								if ( has_custom_logo() ) {
									the_custom_logo();
								} else {
									?> <span> Logo Here </span>
							<?php } ?>

	           </a>
	         </div>
						<nav id="nav" class="flex-wrapper">
							<?php get_template_part('navigation') ?>
						</nav>

						<div id="mobile-nav" class="flex-wrapper">
							<div class="hamburger">
								<span></span>
								<span></span>
								<span></span>
								<span></span>
							</div>
						</div>
					</div>
				</div>

				<div id="mobile-nav-drawer">
					<?php get_template_part('navigation') ?>
				</div>
