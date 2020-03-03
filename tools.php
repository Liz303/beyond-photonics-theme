<?php
    /**
    * Template Name: Tools & Facilities
    */
?>
<?php
  get_header();
  $page = get_page_by_title('Tools & Facilities');
  $image = wp_get_attachment_image_src(get_post_thumbnail_id($page->ID), 'single-post-thumbnail');
?>

<div class="main-content-wrap page-container" id="tools-facilities">
  <div class="header-image">
      <div class="content-container page-container flex-wrapper">
        <h1><?php echo get_the_title($page) ?> </h1>
      </div>
    <div class="image-overlay"></div>
    <div class="image hide-print"
         style="background-image: url('<?php echo $image[0] ?>')">
    </div>
    <div class="image show-print">
      <img src="<?php echo $image[0] ?>"/>
    </div>
  </div>
  <section class="flex-wrapper">
    <div class="copy-container intro-copy">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php echo the_content() ?>
      <?php endwhile ?>
    </div>
  </section>
  <?php get_footer(); ?>
</div>
