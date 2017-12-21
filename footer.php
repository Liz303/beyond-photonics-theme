<!-- Footer -->
    <div class="footer">
        <section class="flex-wrapper center">
          <?php
            $contact = array( 'post_type' => 'contacts', );
            $loop = new WP_Query( $contact );
             while ( $loop->have_posts() ) : $loop->the_post();
          ?>
          <div class="full"> email:
            <a href="mailto:<?php echo get_post_meta( $post->ID, 'email', true ) ?>" target="blank">
              <?php echo get_post_meta( $post->ID, 'email', true ) ?>
            </a>
          </div>
          <div class="full"> phone: <?php echo get_post_meta( $post->ID, 'phone', true )  ?></div>
          <a href="<?php echo get_option('linkedin'); ?>" class="full"><i class="fa fa-linkedin"></i></a>
        </section>

      <!-- Copyright -->
      <div class="copyright flex-wrapper">
          <div>&copy; Beyond Photonics. All rights reserved |
            <?php
              $google_address_link = get_post_meta( $post->ID, 'google_map_link', true );
              if( !empty($google_address_link)) {
              echo '<a href="' . esc_html( get_post_meta( get_the_ID(), 'google_map_link', true )) . '">';
              }
              echo
              '<span>' .
                esc_html( get_post_meta( get_the_ID(), 'address_street_1', true ) ) .
              ', ' .
                esc_html( get_post_meta( get_the_ID(), 'address_street_2', true ) ) .
              '</span>
               <span> ' .
                 esc_html( get_post_meta( get_the_ID(), 'address_city', true ) ) .
              ', ' .
                 esc_html( get_post_meta( get_the_ID(), 'address_state', true ) ) .
              ' ' .
                 esc_html( get_post_meta( get_the_ID(), 'address_zip', true ) ) .
              '</span>';
              if( !empty($google_address_link)) {
                 echo '</a>';
              }
            ?>
          </div>
      </div>
        <?php endwhile; ?>
    </div>
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
