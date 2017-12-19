<?php
    /**
    * Template Name: Tools & Facilities
    */
?>
<?php get_header(); ?>

<div class="main-content-wrap page-container" id="tools-facilities">
  <div class="header-image">
    <div class="image-overlay"></div>
    <div class="image"
         style="background-image: url('<?php echo the_post_thumbnail_url() ?>')">
    </div>
  </div>
  <div class="header-content-container flex-wrapper">
    <h1><?php echo get_the_title() ?> </h1>
    <div class="copy-container intro-copy">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php echo the_content() ?>
        <?php endwhile ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
