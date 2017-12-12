<?php
    /**
    * Template Name: Products Page
    */
?>
<?php get_header(); ?>

<div className="main-content-wrap">
  <h1> Products Page </h1>
  <?php
		if ( have_posts() ) : while ( have_posts() ) : the_post();

			get_template_part( 'content', get_post_format() );

		endwhile; endif;
	?>
</div>

<?php get_footer(); ?>
