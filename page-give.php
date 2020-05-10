<?php
/**
 * The template for displaying all pages
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
$id = 'resource';
get_header();
?>
<!--banner-->
<div id="banner" class="section_style">
  <div class="container">
    <h1>Donate to Our Course</h1>
    <p class="tagline">We are glad for your kind gesture</p>
  </div>
</div>
</div>
<!--main content-->
<div class="container">
  <div class="row">
  <?php
  while ( have_posts() ) :
    the_post();

    the_content();
  endwhile; // End of the loop.
  ?>
  </div>
</div>
<!--end of main content-->
<?php get_footer();?>
