<?php
    /**
    * Template Name: Capabilities
    */
?>
<?php
  get_header();
  $page = get_page_by_title('Capabilities');
  $image = wp_get_attachment_image_src(get_post_thumbnail_id($page->ID), 'single-post-thumbnail');
?>

<div class="main-content-wrap page-container" id="capabilities">
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
    $capabilities = array( 'post_type' => 'capability_sections', );
    $loop = new WP_Query( $capabilities );
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
      </div>
    </section>
  <?php
    $i ++;
    endwhile;
  ?>

<?php get_footer(); ?>
</div>
