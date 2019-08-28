<!-- Footer -->
    <div class="footer">
      <section class="flex-wrapper center">
        <?php
          $contact = array( 'post_type' => 'contacts', );
          $loop = new WP_Query( $contact );
           while ( $loop->have_posts() ) : $loop->the_post();
           $email = get_post_meta( $post->ID, 'email', true );
           $phone = get_post_meta( $post->ID, 'phone', true );
           $linkedin = get_option('linkedin');
        ?>
        <div>
        <?php if( !empty($email)) { ?>
            <span>
              <a href="mailto:<?php echo $email ?>" target="blank">
                <?php echo $email ?>
              </a>
            </span> |
        <?php } ?>

        <?php if( !empty($phone)) { ?>
            <span> <?php echo get_post_meta( $post->ID, 'phone', true )  ?> </span>
            <?php
              $google_address_link = get_post_meta( $post->ID, 'google_map_link', true );
              $address_street_1 = esc_html( get_post_meta( get_the_ID(), 'address_street_1', true ) );
              $address_street_2 = esc_html( get_post_meta( get_the_ID(), 'address_street_2', true ) );
              $city = esc_html( get_post_meta( get_the_ID(), 'address_city', true ) );
              $add_state = esc_html( get_post_meta( get_the_ID(), 'address_state', true ) );
              $zip =  esc_html( get_post_meta( get_the_ID(), 'address_zip', true ) );
              if ( !empty($address_street_1) ||
                   !empty($address_street_2) ||
                   !empty($city) ||
                   !empty($add_state) ||
                   !empty($zip)) {  echo ' | '; }
                   ?>
            <span>
              <?php
              if( !empty($google_address_link)) {
                echo '<a href="' . esc_html( get_post_meta( get_the_ID(), 'google_map_link', true )) .'">';
              }
              if ( !empty($address_street_1)) {  echo $address_street_1 . ' '; }
              if ( !empty($address_street_2)) { echo ', ' . $address_street_2 . ' ';  }
              if ( !empty($city) ) { echo $city; }
              if ( !empty($city) && !empty($add_state) ) { echo ', '; }
              if ( !empty($add_state)) { echo $add_state . ' '; }
              if ( !empty($zip)) { echo $zip; }
              if( !empty($google_address_link)) { echo '</a>'; }
            ?>
          </span>
        <?php } ?>

      </div>
      </section>
      <section class="flex-wrapper center">
        <?php if ( !empty($linkedin)) { ?>
          <span>
            <a href="<?php echo get_option('linkedin'); ?>"><i class="fa fa-linkedin"></i></a>
          </span>
        <?php } ?>
      </section>

      <!-- Copyright -->
      <div class="copyright flex-wrapper">
          <div> &copy; Beyond Photonics. All rights reserved. </div>
      </div>
        <?php endwhile; ?>
    </section>
  </div>

  <!-- Scripts -->
  <!-- <script src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery.dropotron.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/js/skel.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/js/util.js"></script> -->
  <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
  <!-- <script src="<?php echo get_bloginfo('template_directory'); ?>/js/main.js"></script> -->
<?php wp_footer(); ?>
  </body>
</html>
