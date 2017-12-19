<section class="post">
  <div class="section-content">
    <h2 class="blog-post-title"><?php the_title(); ?></h2>
    <div class="featured-image"
         style="background-image:url('<?php the_post_thumbnail_url(); ?>')">
    </div>
   <div class="content-container">
     <?php the_content(); ?>
   </div>
 </div>
</section>
