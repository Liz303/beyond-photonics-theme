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
						<span class="page-link"><?php echo $page->post_title; ?></span>
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
