<?php
    /**
    * Template Name: Company
    */
?>
<?php get_header(); ?>

<div class="main-content-wrap page-container" id="team">
  <div class="header-image">
    <?php if( '' == get_post()->post_content ) : ?>
      <div class="content-container flex-wrapper">
        <h1><?php echo get_the_title() ?> </h1>
      </div>
    <?php endif ?>
    <div class="image-overlay"></div>
    <div class="image"
         style="background-image: url('<?php echo the_post_thumbnail_url() ?>')">
    </div>
  </div>
  <?php if( '' !== get_post()->post_content ) : ?>
    <div class="header-content-container flex-wrapper">
      <h1><?php echo get_the_title() ?> </h1>
      <div class="copy-container intro-copy">
          <?php while ( have_posts() ) : the_post(); ?>
            <?php echo the_content() ?>
          <?php endwhile ?>
      </div>
    </div>
  <?php endif; ?>
  <section class="buttons flex-wrapper">
    <div class="one-half flex-wrapper">
      <a href="/tools-facilities" class="content-container">
        <button class="btn-red"> Learn More About Our Tools & Facilities </button>
      </a>
    </div>
    <div class="one-half flex-wrapper">
      <a href="/capabilities" class="content-container">
        <button class="btn-red"> Learn More About Our Capabilties </button>
      </a>
    </div>
  </section>
  <section class="team-title" id="leadership-team">
    <div class="section-content">
      <div class="section-header-container flex-wrapper">
        <h1> Our Leadership Team </h1>
        <div class="line"></div>
      </div>

  <?php
    $team = array( 'post_type' => 'team_members', );
    $loop = new WP_Query( $team );
    while ( $loop->have_posts() ) : $loop->the_post();?>
      <div class="section-content leadership-item flex-wrapper" id="<?php echo urlencode(get_the_title()) ?>">
          <div class="one-fourth flex-wrapper">
            <div class="thumbnail">
              <?php the_post_thumbnail( ); ?>
              <div class="title">
                <h4><?php the_title() ?></h4>
                <?php echo esc_html( get_post_meta( get_the_ID(), 'position', true ) ); ?>
              </div>
            </div>
          </div>
          <div class="three-fourths flex-wrapper">
            <div class="content-container">
              <?php the_content() ?>
            </div>
          </div>
      </div>

  <?php endwhile; ?>
  </div>
</section>

  <section class="team-title" id="experience-expertise">
    <div class="section-content">
      <div class="section-header-container flex-wrapper">
        <h1> Experience & Expertise </h1>
        <div class="line"></div>
      </div>

      <?php
        $experience = array( 'post_type' => 'experience_sections', );
        $experience_loop = new WP_Query( $experience );

        while ( $experience_loop->have_posts() ) : $experience_loop->the_post();?>
          <div class="section-content" id="<?php echo urlencode(get_the_title()) ?>">
            <div class="title"> <h4><?php the_title() ?></h4></div>
            <div class="experience content-container">
              <?php the_content() ?>
            </div>
          </div>
        <?php endwhile ?>
      </div>
    </section>
    <?php
    $news = new WP_Query(array('category_name' => 'news', ));
    if ( $news->have_posts() ) : ?>
      <section id="news">
          <?php include( locate_template( 'news_slider.php', false, false ) ); ?>
      </section>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
