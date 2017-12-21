<section class="section" id="contact">
  <div class="section-content flex-wrapper">
    <div class="one-half">
      <div class="content-wrap">
        <h1> Get in Touch </h1>
        <div class="description">
          <?php
            $contact = array( 'post_type' => 'contacts', );
            $loop = new WP_Query( $contact );
            ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post();?>
              <?php the_excerpt(); ?>

        </div>
        <h1> Contact Us </h1>
        <div class="description">
            <div class="full">
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
           <div class="full">
             <a href="mailto:<?php echo get_post_meta( $post->ID, 'email', true ) ?>" target="blank">
               <?php echo get_post_meta( $post->ID, 'email', true ) ?>
             </a>
           </div> 
           <div class="full"><?php echo get_post_meta( $post->ID, 'phone', true )  ?></div>
           <a href="<?php echo get_option('linkedin'); ?>" class="full"><i class="fa fa-linkedin"></i></a>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
    <div class="one-half">
      <div class="content-wrap">
          <?php while ( $loop->have_posts() ) : $loop->the_post();?>
            <?php echo the_content(); ?>
          <?php endwhile; ?>
      </div>
    </div>
  </div>
</section>
