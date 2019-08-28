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

        echo '
          <div class="image hide-print" style="background-image: url('.$first_img.')"></div>
          <div class="show-print">
            <div class="image">
              <img src="'.$image .'"/>
            </div>
          </div>
        ';
      ?>
    </div>
    <div class="caption"> <?php the_title(); ?> </div>
</li>
