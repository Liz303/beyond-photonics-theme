<?php
    /**
    * Template Name: Contact
    */
?>
<?php
  get_header();
  $contact = array( 'post_type' => 'contacts', );
  $loop = new WP_Query( $contact );
  while ( $loop->have_posts() ) : $loop->the_post();
    $formatted_address = urlencode(esc_html( get_post_meta( get_the_ID(), 'address_street_1', true ) )) . ',' .
                         urlencode(esc_html( get_post_meta( get_the_ID(), 'address_street_2', true ) )) . '+' .
                         esc_html( get_post_meta( get_the_ID(), 'address_city', true ) ) . ',' .
                         esc_html( get_post_meta( get_the_ID(), 'address_state', true ) ) . '+' .
                         esc_html( get_post_meta( get_the_ID(), 'address_zip', true ) );

  endwhile
?>

<div class="main-content-wrap page-container" id="contact">
  <?php get_template_part('contact_section') ?>
  <section class="map">
    <div class="section-content">
      <iframe
        width="100%"
        height="500"
        frameborder="0" style="border:0"
        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAyqEQbHxUhbaO1LIQNUdwFnVQ5qiRxrgs
          &q=<?php echo $formatted_address ?>&zoom=15" allowfullscreen>
  </iframe>
</div>
    </div>
  </section>
<?php get_footer(); ?>
