<?php
/**
 * Main front page file
 */
get_header();
?>

<div class="main-content-wrap" id="homepage">
  <div class="header-image">
    <div class="content-container flex-wrapper">
      <h1>
        <?php echo get_theme_mod(
          'homepage_header_title',
          'Basic Principles, Infinite Possibilities' );
        ?>
      </h1>
      <div class="copy">
        <?php echo get_theme_mod( 'homepage_header_copy'); ?>
      </div>
        <a href="#"><button class="btn-transparent"> Learn More </button></a>
    </div>
    <div class="image-overlay"></div>
    <div class="image"
         style="background-image: url('<?php echo get_theme_mod( 'homepage_header_image') ?>')">
    </div>
  </div>
  <section class="section-one" id="Applications">
    <h1>
      <?php echo get_theme_mod(
        'homepage_section_one_title',
        'Applications' );
      ?>
    </h1>
    <div class="intro-copy">
      <?php echo get_theme_mod( 'homepage_section_one_intro_copy'); ?>
    </div>
    <div class="flex-wrapper image-row-wrap">
      <?php
        $args = array(
          'category_name' => 'applications',
        );
        $q = new WP_Query( $args);
          if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post(); ?>
          <?php  get_template_part( 'applications_section' ); ?>
        <?php  endwhile; endif;
      ?>
    </div>
  </section>

  <section class="section-two" id="capabilities">
    <h1> Capabilities </h1>
    <div class="intro-copy">
      <?php echo get_theme_mod( 'homepage_capabilities_intro_copy'); ?>
    </div>
    <ul id="lightslider" class="capabilities-slider">
      <?php
        $args = array(
          'category_name' => 'capabilities',
        );
        $q = new WP_Query( $args);
        $i = 0;
          if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post(); ?>
          <?php include( locate_template( 'capabilities_section.php', false, false ) )
          ?>
      <?php
        $i++; endwhile; endif;
      ?>
    </ul>
    <div class="flex-wrapper justify-end">
      <a href="#">
        <button class="btn-red">
          View All Services and Capabilities
        </button>
      </a>
    </div>
  </section>

  <section class="section-three" id="tools-and-facilities">
    <div class="flex-wrapper">
      <div class="one-half flex-wrapper">
        <h1> Tools & Facilities </h1>
        <div class="intro-copy">
          <?php echo get_theme_mod( 'homepage_capabilities_intro_copy'); ?>
        </div>
        <a href="#">
          <button class="btn-red"> Learn More About Our Tools & Facilities</button>
        </a>
      </div>
      <div class="image one-half" style="background-image: url('<?php echo get_theme_mod( 'tools_and_facilities_image') ?>')">

      </div>
    </div>
  </section>

  <section class="section-four" id="products">
    <h1> Products </h1>
    <div class="flex-wrapper image-row-wrap">
      <?php
        $args = array(
          'category_name' => 'products',
        );
        $q = new WP_Query( $args);
          if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post(); ?>
          <?php get_template_part( 'products_section' ); ?>
        <?php
        endwhile; endif;
      ?>
    </div>
  </section>

  <section class="section-five" id="leadership">
    <h1> Leadership Team </h1>
    <div class="intro-copy">
      <?php echo get_theme_mod( 'homepage_leadership_intro_copy'); ?>
    </div>
  </section>

</div>

<?php get_footer(); ?>
