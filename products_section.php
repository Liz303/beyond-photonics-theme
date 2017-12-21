<div class="one-half product flex-wrapper">
  <div class="content-container flex-wrapper">
    <?php
      $content = $post->post_content;
      $first_img = '';
      ob_start();
      ob_end_clean();
      $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
      $first_img = $matches[1][0];
      echo '<div class="image" style="background-image: url('.$first_img.')"></div>';
    ?>
    <div class="caption"> <?php the_title(); ?> </div>
    <div class="description">
        <?php the_excerpt(); ?>
    </div>
    <a href="/products/#<?php echo urlencode(get_the_title()) ?>">
        <button class="btn-red">Learn More </button>
    </a>
  </div>
</div>
