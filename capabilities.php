<?php
    /**
    * Template Name: Capabilities
    */
?>
<?php get_header(); ?>

<div class="main-content-wrap page-container" id="capabilities">
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
  <?php
    $capabilities = array( 'post_type' => 'capability_sections', );
    $loop = new WP_Query( $capabilities );
    $i = 1;
  ?>

  <?php while ( $loop->have_posts() ) : $loop->the_post();?>
    <section id="<?php echo urlencode(get_the_title()) ?>"
             class="<?php echo ($i % 2 == 0) ? 'even-section' : 'odd-section' ?>">
      <?php if($i % 2 == 0) : ?>
        <div class="section-content flex-wrapper full title-start-wrap">
          <div class="one-half-title-start">
            <h2> <?php the_title() ?> </h2>
          </div>
        </div>
      <?php else: ?>
        <div class="section-content flex-wrapper full title-end-wrap">
          <div class="one-half-title-end">
            <h2> <?php the_title() ?> </h2>
          </div>
        </div>
      <?php endif ?>
      <div class="section-content flex-wrapper">
        <?php if($i % 2 == 0) : ?>
            <div class="one-half flex-wrapper">
              <div class="content-container">
                <?php the_content() ?>
              </div>
            </div>
            <div class="one-half flex-wrapper">
              <div class="image-container">
                <?php the_post_thumbnail( ); ?>
              </div>
            </div>
        <?php else : ?>

          <div class="one-half flex-wrapper">
            <div class="image-container">
              <?php the_post_thumbnail( ); ?>
            </div>
          </div>
          <div class="one-half flex-wrapper">
            <div class="content-container">
              <?php the_content() ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </section>
  <?php
    $i ++;
    endwhile;
  ?>
</div>

<?php get_footer(); ?>
