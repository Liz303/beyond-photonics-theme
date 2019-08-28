<?php
    /**
    * Template Name: Company
    */
?>
<?php
  get_header();
  $page = get_page_by_title('Company');
  $image = wp_get_attachment_image_src(get_post_thumbnail_id($page->ID), 'single-post-thumbnail');
?>

<div class="main-content-wrap page-container" id="company">
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
      <h2 class="hr-titles"><span>Our Leadership Team</span></h2>
    </div>

  <?php
    $team = array( 'post_type' => 'team_members', );
    $loop = new WP_Query( $team );
    while ( $loop->have_posts() ) : $loop->the_post();?>
      <?php if (get_the_title() == 'Intro') { ?>
        <div class="section-content leadership-item flex-wrapper" id="<?php echo urlencode(get_the_title()) ?>">
          <?php the_content() ?>
        </div>
      <?php } else { ?>
      <div class="section-content leadership-item flex-wrapper" id="<?php echo urlencode(get_the_title()) ?>">
          <div class="full flex-wrapper">
            <div class="thumbnail">
              <?php the_post_thumbnail( ); ?>
              <div class="title">
                <h4><?php the_title() ?></h4>
                <?php echo esc_html( get_post_meta( get_the_ID(), 'position', true ) ); ?>
              </div>
            </div>
          </div>
          <div class="full flex-wrapper">
            <div class="content-container">
              <?php
                $content = get_the_content();
                $raw_content = $content = strip_tags($content);
                if ( strlen($raw_content) > 1000 ) { ?>
                <div class="abbreviated"> <?php the_content() ?> </div>
                <div class="hr-titles read-more">
                  <span class="open-text">Read More <br> <i class="fa fa-angle-down"></i></span>
                  <span class="close-text hidden">Close <br> <i class="fa fa-angle-up"></i></span>
                </div>
                <?php
                } else {
                  echo the_content();
                }
             ?>
            </div>
          </div>
      </div>
    <?php } ?>
    <?php endwhile; ?>
  </section>

  <section class="team-title" id="experience-expertise">
    <div class="section-content title">
      <h2 class="hr-titles"><span>Experience & Expertise</span></h2>
    </div>
      <?php
        $experience = array( 'post_type' => 'experience_sections', );
        $experience_loop = new WP_Query( $experience );

        while ( $experience_loop->have_posts() ) : $experience_loop->the_post();?>
          <?php if( get_the_title() === 'Intro') {  ?>
            <div class="section-content centered-content" id="<?php echo urlencode(get_the_title()) ?>">
              <div class="content-container">
                <?php the_content() ?>
              </div>
            </div>
        <?php  } else { ?>
          <div class="section-content centered-content" id="<?php echo urlencode(get_the_title()) ?>">
            <div class="title"> <h4><?php the_title() ?></h4></div>
            <div class="experience content-container">
              <?php
                $content = get_the_content();
                $raw_content = $content = strip_tags($content);
                if ( strlen($raw_content) > 1000 ) { ?>
                <div class="abbreviated"> <?php the_content() ?> </div>
                <div class="hr-titles read-more">
                  <span class="open-text">Read More <br> <i class="fa fa-angle-down"></i></span>
                  <span class="close-text hidden">Close <br> <i class="fa fa-angle-up"></i></span>
                </div>
                <?php
                } else {
                  echo the_content();
                }
             ?>
            </div>
          </div>
        <?php } endwhile ?>
  </section>
    <?php
    $news = new WP_Query(array('category_name' => 'news', ));
    if ( $news->have_posts() ) : ?>
      <div class="section-content">
        <h2 class="hr-titles"><span>News</span></h2>
      </div>
      <section id="news">
          <?php include( locate_template( 'news_slider.php', false, false ) ); ?>
      </section>
    <?php endif; ?>
    <?php get_footer(); ?>
</div>
