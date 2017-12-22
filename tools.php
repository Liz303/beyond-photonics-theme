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
  <div class="<?php echo ( '' == get_post($page)->post_content ) ? 'header-image short' : 'header-image'?>">
    <?php if( '' == get_post($page)->post_content ) : ?>
      <div class="content-container flex-wrapper">
        <h1><?php echo get_the_title($page) ?> </h1>
      </div>
    <?php endif ?>
    <div class="image-overlay"></div>
    <div class="image"
         style="background-image: url('<?php echo $image[0] ?>')">
    </div>
  </div>
  <?php if( '' !== get_post($page)->post_content ) : ?>
    <div class="header-content-container flex-wrapper">
      <h1><?php echo get_the_title($page) ?> </h1>
      <div class="copy-container intro-copy">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php echo the_content() ?>
        <?php endwhile ?>
      </div>
    </div>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
