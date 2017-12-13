<section>
  <h2 class="blog-post-title"><?php the_title(); ?></h2>

   <?php
       $content = get_the_content();
       $content = preg_replace("/<img[^>]+\>/i", " ", $content);
       $content = apply_filters('the_content', $content);
       $content = str_replace(']]>', ']]>', $content);
       echo $content
    ?>

    <?php
     $args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID );
       $attachments = get_posts($args);
       if ($attachments) {
           foreach ( $attachments as $attachment ) {
               the_attachment_link( $attachment->ID , false );
           }
       }
     ?>
</section>
