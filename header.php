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
						<ul>
							<?php $pages = get_pages(array(
														'sort_order' => 'asc',
														'sort_column' => 'menu_order',
														'post_type' => 'page',
														'post_status' => 'publish'
													));
									foreach ($pages as $page) { ?>
										<li class="page_item <?php echo is_page($page) ? 'current_page_item' : '' ?>">
											<a href="/<?php echo get_page_uri($page) ?>">
												<?php echo $page->post_title; ?>
											</a>
												<?php

												switch ($page->post_title) {
													case 'Applications':
														$applications = array( 'post_type' => 'application_sections', );
														$loop = new WP_Query( $applications );
														if ($loop->have_posts()) : ?>
															<ul class="subnav">
															<?php while ($loop->have_posts()) : $loop->the_post(); ?>
																<li>
																	<a href="/<?php echo get_page_uri($page) ?>#<?php echo urlencode(get_the_title()) ?>">
																		<?php echo the_title() ?>
																	</a>
																</li>
															<?php endwhile; ?>
															</ul>
														<?php endif;
														break;
													case 'Capabilities':
														$capabilities = array( 'post_type' => 'capability_sections', );
														$capabilities_loop = new WP_Query( $capabilities );
														if ($capabilities_loop->have_posts()) : ?>
															<ul class="subnav">
															<?php while ($capabilities_loop->have_posts()) : $capabilities_loop->the_post(); ?>
																<li>
																	<a href="/<?php echo get_page_uri($page) ?>#<?php echo urlencode(get_the_title()) ?>">
																		<?php echo the_title() ?>
																	</a>
																</li>
															<?php endwhile; ?>
															</ul>
														<?php endif;
														break;
													case 'Products':
														$products = array( 'post_type' => 'product_sections', );
														$products_loop = new WP_Query( $products );
														if ($products_loop->have_posts()) : ?>
															<ul class="subnav">
															<?php while ($products_loop->have_posts()) : $products_loop->the_post(); ?>
																<li>
																	<a href="/<?php echo get_page_uri($page) ?>#<?php echo urlencode(get_the_title()) ?>">
																		<?php echo the_title() ?>
																	</a>
																</li>
															<?php endwhile; ?>
															</ul>
														<?php endif;
														break;
													case 'Company': ?>
														<ul class="subnav">
															<li>
																<a href="/<?php echo get_page_uri($page) ?>#about">
																	About
																</a>
															</li>
															<li>
																<a href="/<?php echo get_page_uri($page) ?>#leadership">
																	Leadership Team
																</a>
															</li>
															<li>
																<a href="/<?php echo get_page_uri($page) ?>#experience">
																	Experience & Expertise
																</a>
															</li>
															<?php
														    $news = new WP_Query(array('category_name' => 'news', ));
														    if ( $news->have_posts() ) : ?>
																	<li>
																		<a href="/<?php echo get_page_uri($page) ?>#experience">
																			News
																		</a>
																	</li>
															<?php endif; ?>
														</ul>
													<?php
														break;
													case 'Contact':
														break;

												}
												?>
										</li>

							<?php } ?>
						</ul>
					</nav>
				</div>
