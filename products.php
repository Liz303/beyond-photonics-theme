<?php
    /**
    * Template Name: Products
    */
?>
<?php
  get_header();
  $page = get_page_by_title('Products');
  $image = wp_get_attachment_image_src(get_post_thumbnail_id($page->ID), 'single-post-thumbnail');
?>

<div class="main-content-wrap page-container" id="products">
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
  <?php
    $products = array( 'post_type' => 'product_sections', );
    $loop = new WP_Query( $products );
    $i = 1;
  ?>

  <?php while ( $loop->have_posts() ) : $loop->the_post();
      $posttext = $post->post_content;
      $regex = '~<img [^\>]*\ />~';
      preg_match_all($regex, $posttext, $images);
      $posttext = preg_replace($regex, '', $posttext);
  ?>
    <section id="<?php echo urlencode(get_the_title()) ?>"
             class="<?php echo ($i % 2 == 0) ? 'even-section' : 'odd-section' ?>">
     <div class="section-content">
       <h2 class="hr-titles <?php echo strlen( get_the_title() ) > 35 ? 'tall-title' : ''?>"><span><?php the_title() ?></span></h2>
     </div>
      <?php
        $posttext = $post->post_content;
        $regex = '~<img [^\>]*\ />~';
        preg_match_all($regex, $posttext, $images);
        $posttext = preg_replace($regex, '', $posttext); ?>
      <div class="section-content flex-wrapper">
        <?php if($i % 2 == 0) : ?>
            <div class="one-half flex-wrapper order-two">
              <div class="content-container">
                  <?php echo $posttext; ?>
              </div>
            </div>
            <div class="one-half flex-wrapper order-one">
              <?php include( locate_template( 'image_container.php', false, false ) ); ?>
            </div>
        <?php else : ?>
          <div class="one-half flex-wrapper order-one">
            <?php include( locate_template( 'image_container.php', false, false ) ); ?>
          </div>
          <div class="one-half flex-wrapper order-two">
            <div class="content-container">
              <?php echo $posttext; ?>
            </div>
          </div>
        <?php endif; ?>
        <div class="specifications order-three">
          <h3 class="full"><?php echo get_post_meta( get_the_ID(), 'spec_title', true ) ?> </h3>
          <div class="full two-column">
            <?php echo get_post_meta( get_the_ID(), 'custom_editor', true ) ?>
          </div>
        </div>
      </div>
    </section>
  <?php
    $i ++;
    endwhile;
  ?>
  <div class="download-page-footer">
    <a class="download-pdf" href="<?php echo get_template_directory_uri(); ?>/img/Beyondphotonics_product_opt.pdf" download><button class="btn-red download-page"> Download Page PDF </button></a>
  </div>
  <?php get_footer(); ?>
</div>
