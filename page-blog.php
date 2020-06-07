<?php
/**
 * Template Name: Blog
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gsen
 */

get_header();
?>

<!--end of header-->

<!--banner-->
  <div id="banner" class="section_style">
    <div class="container">
      <h1>Lastest News</h1>
    </div>
  </div>
</div>
<!--Main Content Area-->
<div class="container">
  <div class="main-blog">
    <div class="col-12">
      <h3>All News</h3>
    </div>
  <div class="blog-container">
    <?php
      //get the url query parameters
      $currentPage = get_query_var('paged');

      $news = new WP_Query(array(
        'category_name'=>'news',
        'posts_per_page'=> 5,
        'paged' => $currentPage
      ));
      //check if there are post in that category_name
      if($news->have_posts()):
        while($news->have_posts()):
        $news->the_post();?>
        <div class="blog-card">
          <div class="blog-img">
            <?php the_post_thumbnail();?>
          </div>

          <div class="blog-info">
            <div class="blog-title">
              <h4><?php the_title();?></h4>
            </div>

            <?php if($post->$post_excerpt) { ?>
              <p class="blog-exempt"><?php echo get_the_excerpt();?></p>
              <a href="<?php the_permalink();?>" class="strong">Read More</a>

            <?php } else {
             the_content(); } ?>
          </div>
        </div>

    <?php endwhile;
      //reset WP_Query
      wp_reset_query();
    endif; ?>

    <div class="pagination-wrapper">
      <?php echo paginate_links(array(
        'total'=> $news->max_num_pages
      ));?>
    </div>

  </div>
  </div>
</div>
<!--End of Main content-->

<!--footer-->
<?php get_footer();?>
