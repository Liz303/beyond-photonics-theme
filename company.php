<?php
    /**
    * Template Name: Company
    */
?>
<?php get_header(); ?>

<div className="main-content-wrap">
  <h1> Capabilities Page </h1>
  <?php
		if ( have_posts() ) : while ( have_posts() ) : the_post();

			get_template_part( 'content', get_post_format() );

		endwhile; endif;
	?>
</div>

<?php get_footer(); ?>
