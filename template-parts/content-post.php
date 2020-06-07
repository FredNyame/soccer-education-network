<div class="blog-card">
  <div class="blog-header">
    <span class="article-date"><?= the_time('F jS, Y'); ?></span>
    <div class="blog-img">
      <?php if(has_post_thumbnail()): ?>
        <div style="background: url(<?= get_the_post_thumbnail_url() ;?>) no-repeat center center/cover;"></div>
        <?php //the_post_thumbnail();?>
      <?php else: ?>
      <?php endif; ?>
    </div>
  </div>

  <div class="blog-info">
    <?php 
      if(has_category()): 
      $categories = get_the_category();       
    ?>
      <?php foreach($categories as $category): ?>
        <a href="<?= home_url('/category/'.$category->slug);?>" class="article-categories"><?= strtoupper($category->cat_name);?></a>
      <?php endforeach; ?>
    <?php endif; ?>

    <div class="blog-title">
      <h4><?php the_title();?></h4>
    </div>

    <?php if(has_excerpt()): ?>
      <p class="blog-exempt"><?php echo wp_trim_words(get_the_excerpt(), 60, '...');?></p>
    <?php else: ?>
      <p class="blog-exempt"><?php echo wp_trim_words(get_the_content(), 60, '...');?></p>
    <?php endif; ?>

    <a href="<?php the_permalink();?>" aria-label="read article" class="strong">Read More</a>
  </div>
</div>