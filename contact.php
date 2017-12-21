<?php
    /**
    * Template Name: Contact
    */
?>
<?php
  get_header();
  $page = get_page_by_title('Contact');
  $image = wp_get_attachment_image_src(get_post_thumbnail_id($page->ID), 'single-post-thumbnail');
?>

<div className="main-content-wrap">
  <h1> Capabilities Page </h1>
  <?php
		if ( have_posts() ) : while ( have_posts() ) : the_post();

			get_template_part( 'content', get_post_format() );

		endwhile; endif;
	?>
</div>

<?php get_footer(); ?>
