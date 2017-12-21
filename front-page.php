<?php
/**
 * Main front page file
 */
get_header();
?>

<div class="main-content-wrap" id="homepage">
  <div class="header-image">
    <div class="content-container page-content flex-wrapper">
      <h1>
        <?php echo get_theme_mod(
          'homepage_header_title',
          'Basic Principles, Infinite Possibilities' );
        ?>
      </h1>
      <div class="copy-container">
        <p><?php echo get_theme_mod( 'homepage_header_copy'); ?></p>
      </div>
      <a href="#"><button class="btn-transparent"> Learn More </button></a>
    </div>
    <div class="image-overlay"></div>
    <div class="image"
         style="background-image: url('<?php echo get_theme_mod( 'homepage_header_image') ?>')">
    </div>
  </div>
  <?php
    $news = new WP_Query(array('category_name' => 'news', ));
    if ( $news->have_posts() ) : ?>
      <section id="news">
          <?php include( locate_template( 'news_slider.php', false, false ) ); ?>
      </section>
  <?php endif; ?>
  <section class="section" id="Applications">
    <div class="section-content">
      <h2 class="hr-titles"><span>Applications</span></h2>
      <div class="intro-copy">
        <?php echo get_theme_mod( 'homepage_section_one_intro_copy'); ?>
      </div>

      <?php
        $applications = array( 'post_type' => 'application_sections', );
        $loop = new WP_Query( $applications );
        $num_of_posts = $loop->post_count;
        $needs_slider = $num_of_posts > 4;
        $section_page = 'applications';
        $i = 0;
      ?>
      <?php if($num_of_posts > 4) : ?>
        <ul id="lightslider" class="applications-slider">
          <?php
            if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
              <?php include( locate_template( 'image_slider_item.php', false, false ) )?>
          <?php
            $i++;
            endwhile; endif;
          ?>
        </ul>
        <a href="/applications">
          <button class="btn-red">
            View All Applications
          </button>
        </a>
      <?php else : ?>
        <div class="flex-wrapper image-row-wrap">
          <?php while ( $loop->have_posts() ) : $loop->the_post();?>
            <?php include( locate_template( 'one_fourth_section.php', false, false ) )?>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <section class="section" id="capabilities">
    <div class="section-content">
      <h2 class="hr-titles"><span>Capabilities</span></h2>
      <div class="intro-copy">
        <?php echo get_theme_mod( 'homepage_capabilities_intro_copy'); ?>
      </div>
      <?php
        $capabilities = array( 'post_type' => 'capability_sections', );
        $loop = new WP_Query( $capabilities );
        $num_of_posts = $loop->post_count;
        $needs_slider = $num_of_posts > 4;
        $section_page = 'capabilities';
        $i = 0;
      ?>
      <?php if($num_of_posts > 4) : ?>
        <ul id="lightslider" class="applications-slider">
          <?php
            if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
              <?php include( locate_template( 'image_slider_item.php', false, false ) )?>
          <?php
            $i++;
            endwhile; endif;
          ?>
        </ul>
        <div class="flex-wrapper justify-end">
          <a href="/capabilities">
            <button class="btn-red">
              View All Services and Capabilities
            </button>
          </a>
        </div>
      <?php else : ?>
        <div class="flex-wrapper image-row-wrap">
          <?php while ( $loop->have_posts() ) : $loop->the_post();?>
            <?php include( locate_template( 'one_fourth_section.php', false, false ) )?>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <section class="section" id="tools-and-facilities">
    <div class="section-content">
      <h2 class="hr-titles"><span>Tools & Facilities</span></h2>
      <div class="flex-wrapper tools-content">
        <div class="one-half flex-wrapper">
          <div class="intro-copy">
            <?php echo get_theme_mod( 'homepage_capabilities_intro_copy'); ?>
          </div>
          <a href="/tools-facilities">
            <button class="btn-red"> Learn More About Our Tools & Facilities</button>
          </a>
        </div>
        <div class="image one-half" style="background-image: url('<?php echo get_theme_mod( 'tools_and_facilities_image') ?>')">
        </div>
      </div>
    </div>
  </section>

  <section class="section" id="products">
    <div class="section-content">
      <h2 class="hr-titles"><span>Products</span></h2>
      <div class="flex-wrapper">
        <?php
          $products = array( 'post_type' => 'product_sections', );
          $loop = new WP_Query( $products );
          $num_of_posts = $loop->post_count;
          $needs_slider = $num_of_posts > 4;
          $section_page = 'products';
        ?>
        <?php
          if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
          <?php get_template_part( 'products_section' ); ?>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </section>

  <section class="section" id="leadership">
    <div class="section-content">
      <h2 class="hr-titles"><span>Leadership Team</span></h2>
      <div class="intro-copy">
        <?php echo get_theme_mod( 'homepage_leadership_intro_copy'); ?>
      </div>
      <div class="team-wrapper flex-wrapper">
        <?php
          $team = array( 'post_type' => 'team_members', );
          $loop = new WP_Query( $team );
          ?>
          <?php while ( $loop->have_posts() ) : $loop->the_post();?>
            <?php if (get_the_title() !== 'Intro') { ?>
              <?php get_template_part('leadership_section'); ?>
            <?php } ?>
          <?php endwhile; ?>
      </div>
    </div>
  </section>

  <?php get_template_part('contact_section') ?>
</div>

<?php get_footer(); ?>
