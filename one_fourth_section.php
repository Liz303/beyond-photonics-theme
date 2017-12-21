<div class="one-fourth chemical-sensing flex-wrapper">
  <a href="/<?php echo $section_page ?>/#<?php echo urlencode(get_the_title()) ?>">
    <div class="content-container">
      <div class="image-container">
        <div class="image-overlay"></div>
        <?php
        $image = get_the_post_thumbnail_url($post->ID, 'full');
        ?>
        <div class="image" style="background-image: url('<?php echo $image; ?>')"></div>
      </div>
      <div class="caption"> <?php the_title(); ?> </div>
    </div>
  </a>
</div>
