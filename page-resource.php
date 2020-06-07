<?php
/**
 * Template Name: Resource
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
     <h1>Resources</h1>
   </div>
 </div>
</div>

<!--Main List header-->
<section class="row" id="curated-list">
 <h2 class="top_heading">
     A curated list of studying resources
 </h2>
 <p class="mission_p">
   The best free resources for students to study for the SAT and TOEFL exams All in one place.
 </p>

<!--Listing of study resource-->
<div class="container">
 <div class="study-wrap">
   <div class="col-12">
     <h3>SAT Courses Tutorials</h3>
   </div>
   <?php
    $args = array(
      'category_name' => 'sat-courses',
      'posts_per_page' => 3,
      'order' => 'ASC'
    );
      $satCourses = new WP_Query($args);
      while($satCourses->have_posts()):
        $satCourses->the_post();?>
        <div class="col-3">
          <div class="col-card">
            <a href="<?php echo get_post_meta($post->ID, 'link', true);?>" target="_blank">
              <div class="col-img">
                <?php the_post_thumbnail();?>
              </div>
              <div class="col-p">
                <h4><?php the_title();?></h4>
                <?php 
                if(has_excerpt()) {
                  echo wp_trim_words(get_the_excerpt(), '15', '...');
                }
                ?>
              </div>
              <p class="view-more">View More</p>
            </a>
          </div>
        </div>
    <?php endwhile;
    //reset WP_Query
    wp_reset_query();
    ?>

   <div class="col-12">
     <h3>TOEFL Courses Tutorials</h3>
   </div>

   <?php
    $args = array(
      'category_name' => 'toefl-courses',
      'posts_per_page' => 3,
      'order' => 'ASC'
    );
      $satCourses = new WP_Query($args);
      while($satCourses->have_posts()):
        $satCourses->the_post();?>
        <div class="col-3">
          <div class="col-card">
            <a href="<?php echo get_post_meta($post->ID, 'link', true);?>" target="_blank">
              <div class="col-img">
                <?php the_post_thumbnail();?>
              </div>
              <div class="col-p">
                <h4><?php the_title();?></h4>
                <?php
                  if(has_excerpt()) {
                    echo wp_trim_words(get_the_excerpt(), '15', '...');
                  }
                ?>
              </div>
              <p class="view-more">View More</p>
            </a>
          </div>
        </div>
    <?php endwhile;
    //reset WP_Query
    wp_reset_query();
    ?>

   <div class="col-12">
     <h3>Practice Tests - SAT</h3>
   </div>

   <?php
    $args = array(
      'category_name' => 'sat-practice-test',
      'posts_per_page' => 3,
      'order' => 'ASC'
    );
      $satCourses = new WP_Query($args);
      while($satCourses->have_posts()):
        $satCourses->the_post();?>
        <div class="col-3">
          <div class="col-card">
            <a href="<?php echo get_post_meta($post->ID, 'link', true);?>" target="_blank">
              <div class="col-img">
                <?php the_post_thumbnail();?>
              </div>
              <div class="col-p">
                <h4><?php the_title();?></h4>
                <?php
                  if(has_excerpt()) {
                    echo wp_trim_words(get_the_excerpt(), '15', '...');
                  }
                ?>
              </div>
              <p class="view-more">View More</p>
            </a>
          </div>
        </div>
    <?php endwhile;
    //reset WP_Query
    wp_reset_query();
    ?>

  <div class="col-12">
    <h3>Practice Tests - TOEFL</h3>
  </div>

  <?php
   $args = array(
     'category_name' => 'toefl-pratice-test',
     'posts_per_page' => 3,
     'order' => 'ASC'
   );
     $satCourses = new WP_Query($args);
     while($satCourses->have_posts()):
       $satCourses->the_post();?>
       <div class="col-3">
         <div class="col-card">
           <a href="<?php echo get_post_meta($post->ID, 'link', true);?>" target="_blank">
             <div class="col-img">
               <?php the_post_thumbnail();?>
             </div>
             <div class="col-p">
               <h4><?php the_title();?></h4>
               <?php
                  if(has_excerpt()) {
                    echo wp_trim_words(get_the_excerpt(), '15', '...');
                  }
               ?>
             </div>
             <p class="view-more">View More</p>
           </a>
         </div>
       </div>
   <?php endwhile;
   //reset WP_Query
   wp_reset_query();
   ?>

   <div class="col-12">
     <h3>Tools</h3>
   </div>

   <?php
    $args = array(
      'category_name' => 'tool',
      'posts_per_page' => 3,
      'order' => 'ASC'
    );
      $satCourses = new WP_Query($args);
      while($satCourses->have_posts()):
        $satCourses->the_post();?>
        <div class="col-3">
          <div class="col-card">
            <a href="<?php echo get_post_meta($post->ID, 'link', true);?>" target="_blank">
              <div class="col-img">
                <?php the_post_thumbnail();?>
              </div>
              <div class="col-p">
                <h4><?php the_title();?></h4>
                <?php
                    if(has_excerpt()) {
                      echo wp_trim_words(get_the_excerpt(), '10', '...');
                    }
                ?>
              </div>
              <p class="view-more">View More</p>
            </a>
          </div>
        </div>
    <?php endwhile;
    //reset WP_Query
    wp_reset_query();
    ?>

 </div>
</div>
</section>
<!--Footer-->
<?php get_footer();?>
