<div class="one-half flex-wrapper" id="leadership-<?php the_ID(); ?>">
  <div class="content-wrap leadership-item flex-wrapper">
    <div class="top">
      <div class="thumbnail">
        <?php the_post_thumbnail( array( 100, 100 ) ); ?>
      </div>

      <!-- Display Title and Author Name -->
      <div class="title">
        <?php the_title(); ?> <br/>
        <div class="position">
          <?php echo esc_html( get_post_meta( get_the_ID(), 'position', true ) ); ?>
        </div>
      </div>
      <div class="description">
        <?php the_excerpt(); ?>
      </div>
    </div>
    <div class="bottom">
      <a class="red" href="/company#<?php echo urlencode(get_the_title()) ?>">
        Read More
      </a>
    </div>
  </div>
</div>
