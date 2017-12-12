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
      <div class="one-fourth chemical-sensing flex-wrapper">
        <a href="#" class="sub-page-link">
          <div class="image-container">
            <div class="image-overlay"></div>
            <img src="<?php echo get_theme_mod( 'section_one_chemical_sensing_image' ) ?>"/>
          </div>
          <div class="caption"> Chemical Sensing </div>
        </a>
      </div>

      <div class="one-fourth wind-sensing flex-wrapper">
        <a href="#" class="sub-page-link">
          <div class="image-container">
            <div class="image-overlay"></div>
            <img src="<?php echo get_theme_mod( 'section_one_chemical_sensing_image' ) ?>"/>
          </div>
          <div class="caption"> Wind Sensing </div>
        </a>
      </div>

      <div class="one-fourth hard-target-tracking flex-wrapper">
        <a href="#" class="sub-page-link">
          <div class="image-container">
            <div class="image-overlay"></div>
            <img src="<?php echo get_theme_mod( 'section_one_chemical_sensing_image' ) ?>"/>
          </div>
          <div class="caption"> Hard-Target Tracking, Ranging and Imaging </div>
        </a>
      </div>

      <div class="one-fourth remote-vibrometry flex-wrapper">
        <a href="#" class="sub-page-link">
          <div class="image-container">
            <div class="image-overlay"></div>
            <img src="<?php echo get_theme_mod( 'section_one_chemical_sensing_image' ) ?>"/>
          </div>
          <div class="caption"> Remote Vibrometry </div>
        </a>
      </div>

    </div>
  </section>

  <section class="section-two" id="capabilities">
    <h1> Capabilities </h1>
    <div class="intro-copy">
      <?php echo get_theme_mod( 'homepage_capabilities_intro_copy'); ?>
    </div>
    <div class="image-slider section">
      <div class="image-slider-container flex-wrapper">
        <div class="slider-item">
          <div class="image-container">
            <div class="image-overlay"></div>
            <img src="<?php echo get_theme_mod( 'section_one_chemical_sensing_image' ) ?>"/>
          </div>
          <div class="caption">
            Trade Studies and Conceptual Design Appropriate to the Measurement Application
          </div>
        </div>

        <div class="slider-item">
          <div class="image-container">
            <div class="image-overlay"></div>
            <img src="<?php echo get_theme_mod( 'section_one_chemical_sensing_image' ) ?>"/>
          </div>
          <div class="caption">
            Trade Studies and Conceptual Design Appropriate to the Measurement Application
          </div>
        </div>

        <div class="slider-item">
          <div class="image-container">
            <div class="image-overlay"></div>
            <img src="<?php echo get_theme_mod( 'section_one_chemical_sensing_image' ) ?>"/>
          </div>
          <div class="caption">
            Trade Studies and Conceptual Design Appropriate to the Measurement Application
          </div>
        </div>

        <div class="slider-item">
          <div class="image-container">
            <div class="image-overlay"></div>
            <img src="<?php echo get_theme_mod( 'section_one_chemical_sensing_image' ) ?>"/>
          </div>
          <div class="caption">
            Trade Studies and Conceptual Design Appropriate to the Measurement Application
          </div>
        </div>
      </div>
    </div>
    <div class="flex-wrapper justify-end">
      <a href="#">
        <button class="btn-red">
          View All Services and Capabilities
        </button>
      </a>
    </div>
  </section>

</div>

<?php get_footer(); ?>
