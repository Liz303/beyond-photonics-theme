<?php
    /**
    * Template Name: Default Page
    */
?>
<?php get_header(); ?>

<div className="main-content-wrap">
  <?php
		if ( have_posts() ) : while ( have_posts() ) : the_post();

			get_template_part( 'content', get_post_format() );

		endwhile; endif;
	?>
<?php get_footer(); ?>
</div>
