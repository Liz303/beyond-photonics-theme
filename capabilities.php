<?php
    /**
    * Template Name: Capabilities Page
    */
?>
<?php get_header(); ?>

<div className="main-content-wrap">
  <h1> Capabilities Page </h1>
  <?php
    $args = array (
        'cat' => array(1)
    );

    $cat_posts = new WP_query($args);

    if ($cat_posts->have_posts()) : while ($cat_posts->have_posts()) : $cat_posts->the_post();
            get_template_part( 'content', 'page' );
    endwhile; endif;
	?>
</div>

<?php get_footer(); ?>
