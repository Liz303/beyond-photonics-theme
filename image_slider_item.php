<li>
  <div class="image-container">
    <div class="image-overlay"></div>
      <?php
        $content = $post->post_content;
        $first_img = '';
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
        $first_img = $matches[1][0];

        echo '<div class="image" style="background-image: url('.$first_img.')"></div>'  ;
      ?>
    </div>
    <div class="caption"> <?php the_title(); ?> </div>
</li>
