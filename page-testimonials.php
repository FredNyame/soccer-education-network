<?php
/**
 * Template Name: Testimonials
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gsen
 */

get_header();
?>

<!--banner-->
 <div id="banner" class="section_style">
   <div class="container">
     <h1>Testimonials From Former Student-Athletes</h1>
     <p class="tagline">These verified reviews all come from people who actually went through GSEN</p>
   </div>
 </div>
</div>

<!--main content-->
<div class="container">
<?php
$args = array(
  'category_name' => 'testimonial',
  'order' => 'ASC'
);
$mytestimonials = new WP_Query($args);
while ( $mytestimonials->have_posts() ) :
  $mytestimonials->the_post();?>
  <div class="review-row">
    <div class="review-img" style="background: url(<?= get_the_post_thumbnail_url() ;?>) no-repeat top center/cover;"></div>
    <div class="review-word">
      <?php the_content();?>
    </div>
  </div>
<?php
endwhile; // End of the loop.
wp_reset_query();
?>
</div>
<!--end of main content-->

<!--Footer-->
<?php get_footer();?>
