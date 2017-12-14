<?php
    /**
    * Template Name: Capabilities Page
    */
?>
<?php get_header(); ?>

<div className="main-content-wrap">
  <h1> Capabilities Page </h1>

<?php
  $args = array(
    'category_name' => 'capabilities',
  );
  $q = new WP_Query( $args);
    if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post();
      get_template_part( 'content', 'page' );
    endwhile; endif;
?>

</div>

<?php get_footer(); ?>
