<div class="related">
  <div class="related-img">
    <a href="<?php the_permalink();?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>"><img src="<?= get_the_post_thumbnail_url();?>" alt="Article Image for <?= get_the_title();?>" style="width: 100%;"></a>
  </div>

  <h4><a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>

  <?php if(has_excerpt()): ?>
    <p class="blog-exempt"><?php echo wp_trim_words(get_the_excerpt(), 20, '...');?></p>
  <?php else: ?>
    <p class="blog-exempt"><?php echo wp_trim_words(get_the_content(), 20, '...');?></p>
  <?php endif; ?>

  <a href="<?php the_permalink();?>" aria-label="read article" class="strong">Read More</a>
</div>