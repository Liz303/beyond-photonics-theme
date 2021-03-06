<?php
  // Add scripts and stylesheets
  function beyondphotonics_scripts() {
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'jquery-ui-tabs', array('jquery') );
    wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery') );
    wp_enqueue_style( 'lightslider', get_template_directory_uri() . '/css/lightslider.min.css' );
    wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css' );
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/main.css', array('lightslider', 'flexslider') );
  	wp_enqueue_style( 'main-style', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
    wp_enqueue_script( 'lightslider', get_template_directory_uri() . '/js/lightslider.min.js', array( 'jquery'));
  
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'lightslider', 'flexslider'));

    // wp_enqueue_script( 'theme-customization', get_template_directory_uri() . '/js/theme-customizer.js');
  }

  add_action( 'wp_enqueue_scripts', 'beyondphotonics_scripts' );

  // Add Google Fonts
  function beyondphotonics_google_fonts() {
  				wp_register_style('OpenSans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
  				wp_enqueue_style( 'OpenSans');
  		}

  add_action('wp_print_styles', 'beyondphotonics_google_fonts');

  // WordPress Titles
  add_theme_support( 'title-tag' );

  /* Enable support for custom logo */
  add_theme_support('custom-logo', array(
      'width'         => 150,
      'height'        => auto,
			'flex-width'    => true,
		)
	);

  /*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


  // Custom settings
  function custom_settings_add_menu() {
    add_menu_page( 'Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99 );
  }
  add_action( 'admin_menu', 'custom_settings_add_menu' );
  add_theme_support( 'post-thumbnails' );

  // Create Custom Global Settings
  function custom_settings_page() { ?>
    <div class="wrap">
      <h1>Custom Settings</h1>
      <form method="post" action="options.php">
         <?php
             settings_fields( 'section' );
             do_settings_sections( 'theme-options' );
             submit_button();
         ?>
      </form>
    </div>
  <?php }

  // LinkedIn
  function setting_linkedin() { ?>
    <input type="text" name="linkedin" id="linkedin" value="<?php echo get_option( 'linkedin' ); ?>" />
  <?php }

  function custom_settings_page_setup() {
    add_settings_section( 'section', 'All Settings', null, 'theme-options' );
    add_settings_field( 'linkedin', 'LinkedIn URL', 'setting_linkedin', 'theme-options', 'section' );

    register_setting('section', 'linkedin');
  }

  add_action( 'admin_init', 'custom_settings_page_setup' );


  // Theme Customizer additions
  add_action( 'customize_register' , 'beyondphotonics_options' );

  function beyondphotonics_options( $wp_customize ) {
  	// Sections, settings and controls will be added here

    $wp_customize->add_section(
    	'beyondphotonics_homepage_options',
    	array(
    		'title'       => __( 'Home Page Custom Settings', 'beyondphotonics' ),
    		'priority'    => 100,
    		'capability'  => 'edit_theme_options',
    		'description' => __('Change homepage options here.', 'beyondphotonics'),
    	)
    );

    // HOMEPAGE Header Image
    $wp_customize->add_setting( 'homepage_header_image',
      array(
        'transport' => 'postMessage'
      )
    );
    $wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize,
  	'homepage_header_image_control',
    	array(
    		'label'    => __( 'Upload a header image', 'beyondphotonics' ),
    		'section'  => 'beyondphotonics_homepage_options',
    		'settings' => 'homepage_header_image',
    		'priority' => 10,
    	)
    ));

    // HOMEPAGE Header Title
    $wp_customize->add_setting( 'homepage_header_title',
      array(
        'default' => 'Basic Principles, Infinite Possibilities',
        'transport' => 'postMessage'
      )
    );
    $wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
  	'homepage_header_title_control',
    	array(
    		'label'    => __( 'Add a header title', 'beyondphotonics' ),
    		'section'  => 'beyondphotonics_homepage_options',
    		'settings' => 'homepage_header_title',
    		'priority' => 20,
    	)
    ));

    // HOMEPAGE Header Copy
    $wp_customize->add_setting( 'homepage_header_copy', array(
      'capability' => 'edit_theme_options',
      'default' => 'Lorem Ipsum Dolor Sit amet',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'homepage_header_copy_control', array(
      'type' => 'textarea',
      'section' => 'beyondphotonics_homepage_options', // // Add a default or your own section
      'label' => __( 'Add header copy', 'beyondphotonics' ),
      'priority' => 30,
      'settings' => 'homepage_header_copy'
    ));


    // HOMEPAGE Applications intro copy
    $wp_customize->add_setting( 'homepage_section_one_intro_copy', array(
      'capability' => 'edit_theme_options',
      'default' => 'Lorem Ipsum Dolor Sit amet',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'homepage_section_one_intro_copy_control', array(
      'type' => 'textarea',
      'section' => 'beyondphotonics_homepage_options', // // Add a default or your own section
      'label' => __( 'Add intro copy for Applications Section', 'beyondphotonics' ),
      'priority' => 50,
      'settings' => 'homepage_section_one_intro_copy'
    ));


    // HOMEPAGE Capabilities Intro Copy
    $wp_customize->add_setting( 'homepage_capabilities_intro_copy', array(
      'capability' => 'edit_theme_options',
      'default' => 'Lorem Ipsum Dolor Sit amet',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'homepage_capabilities_intro_copy_control', array(
      'type' => 'textarea',
      'section' => 'beyondphotonics_homepage_options', // // Add a default or your own section
      'label' => __( 'Add intro copy for Capabilities Section', 'beyondphotonics' ),
      'priority' => 70,
      'settings' => 'homepage_capabilities_intro_copy'
    ));

    // HOMEPAGE Tools&Facilities Intro Copy
    $wp_customize->add_setting( 'homepage_tools_and_facilities_intro_copy', array(
      'capability' => 'edit_theme_options',
      'default' => 'Lorem Ipsum Dolor Sit amet',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'homepage_tools_and_facilities_intro_copy_control', array(
      'type' => 'textarea',
      'section' => 'beyondphotonics_homepage_options', // // Add a default or your own section
      'label' => __( 'Add intro copy for Tools & Facilities Section', 'beyondphotonics' ),
      'priority' => 80,
      'settings' => 'homepage_tools_and_facilities_intro_copy'
    ));

    // Tools & Facilities Image
    $wp_customize->add_setting( 'tools_and_facilities_image',
      array(
        'transport' => 'postMessage'
      )
    );
    $wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize,
  	'tools_and_facilities_image_control',
    	array(
    		'label'    => __( 'Upload image for Tools&Facilities Section', 'beyondphotonics' ),
    		'section'  => 'beyondphotonics_homepage_options',
    		'settings' => 'tools_and_facilities_image',
    		'priority' => 90,
    	)
    ));

  }

  // Preview for added theme customizer manage_optionsadd_action( 'customize_preview_init' , 'my_customizer_preview' );
  function beyondphotonics_preview() {
  	wp_enqueue_script(
  		'beyondphotonics_customizer',
  		get_template_directory_uri() . '/js/theme-customizer.js',
  		array(  'jquery', 'customize-preview' ),
  		'',
  		true
  	);

  }
