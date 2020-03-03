<?php if(count($images[0]) > 0) {
  if(count($images[0]) == 1) { ?>
    <div class="image-container">
      <?php foreach ( $images[0] as $image ) { ?>
          <?php echo $image ?>
        <?php } ?>
    </div>
  <?php } else { ?>
    <div class="flexslider">
      <ul class="page-image-slider slides">
        <?php foreach ( $images[0] as $image ) {
        echo '<li> <div class="image">' . $image . '</div> </li>'; } ?>
      </ul>
    </div>
<?php  }
  ?>


<?php  } else { ?>
    <div class="image-container">
      <?php the_post_thumbnail( ); ?>
    </div>

<?php }?>
