<?php
  $news = new WP_Query(array('category_name' => 'news', ));
  if ( $news->have_posts() ) : ?>
  <div class="section-content">
    <ul class="news-slider">
      <?php
        while ($news->have_posts()) : $news->the_post();?>
        <li>
          <a href="<?php echo get_permalink() ?>">
            <div class="image-container">
              <div class="image-overlay"></div>
              <div class="image" style="background-image: url('<?php the_post_thumbnail_url(); ?>')"></div>
            </div>

            <div class="caption">
              <div class="title">
                <?php the_title(); ?>
              </div>
              <div class="intro">
                <?php the_time('M j, Y '); ?>
              </div>
              <div class="read-more">
                <?php
                $content = get_the_content();
                $content = strip_tags($content);
                echo substr($content, 0, 200) . '...Read More';
                 ?>
              </div>
            </div>
          </a>
        </li>
      <?php endwhile; ?>
    </ul>
  </div>
  <?php endif; ?>

  <?php
    // $posttext = $post->post_content;
    // $regex = '~<img [^\>]*\ />~';
    // preg_match_all($regex, $posttext, $images);
    // $posttext = strip_tags(preg_replace($regex, '', $posttext));
    //
    // if (strlen($posttext) >= 20) {
    //   echo substr($posttext, 0, 100) . '...';
    // }
    // else {
    //   echo $posttext;
    // }
  ?>
