<div class="one-half product flex-wrapper">
  <div class="content-container flex-wrapper">
    <?php
      echo '
      <div class="image hide-print" style="background-image: url('. get_the_post_thumbnail_url($post->ID, 'full') .')"></div>
      <div class="image show-print">
        <img src="'. get_the_post_thumbnail_url($post->ID, 'full') .'"/>
      </div>
      ';
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
