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
  <?php
    $products = array( 'post_type' => 'product_sections', );
    $loop = new WP_Query( $products );
    $i = 1;
  ?>

  <?php while ( $loop->have_posts() ) : $loop->the_post();?>
    <section id="<?php echo urlencode(get_the_title()) ?>"
             class="<?php echo ($i % 2 == 0) ? 'even-section' : 'odd-section' ?>">
     <div class="section-content">
       <h2 class="hr-titles <?php echo strlen( get_the_title() ) > 24 ? 'tall-title' : ''?>"><span><?php the_title() ?></span></h2>
     </div>
      <?php
        $posttext = $post->post_content;
        $regex = '~<img [^\>]*\ />~';
        preg_match_all($regex, $posttext, $images);
        $posttext = preg_replace($regex, '', $posttext); ?>
      <div class="section-content flex-wrapper">
        <?php if($i % 2 == 0) : ?>
          <div class="one-half flex-wrapper">
            <div class="content-container">
              <?php echo $posttext; ?>
            </div>
          </div>
          <div class="one-half flex-wrapper">
            <ul class="page-image-slider">
              <?php foreach ( $images[0] as $image ) {
              echo '<li> <div class="image">' . $image . '</div> </li>'; } ?>
            </ul>
          </div>
        <?php else : ?>
          <div class="one-half flex-wrapper">
            <ul class="page-image-slider">
              <?php foreach ( $images[0] as $image ) {
              echo '<li> <div class="image">' . $image . '</div> </li>'; } ?>
            </ul>
          </div>
          <div class="one-half flex-wrapper">
            <div class="content-container">
              <?php echo $posttext; ?>
            </div>
          </div>
        <?php endif; ?>
        <div class="specifications">
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
</div>

<?php get_footer(); ?>
