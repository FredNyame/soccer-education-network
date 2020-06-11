<?php
/**
 * Template Name: About
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
    <h1>Behind The Scenes</h1>
    <p class="tagline">We are here for the love of the game</p>
  </div>
</div>
</div>
<!--Mission Statement-->
<section class="mission-row">
<div class="container">
<!--About Us paragraph-->
<div id="story">
  <?php
  $ourstory = new WP_Query('category_name=story&posts_per_page=1');
  while ( $ourstory->have_posts() ) :
    $ourstory->the_post();?>
    <h2 class="top_heading text-mt2"><?php the_title();?></h2>
    <?php the_content();?>
  <?php
  endwhile; // End of the loop.
  //reset WP_Query
  wp_reset_query();
  ?>
</div>
</div>
<!--Mission and vision Section-->
<div id="missionVision">
<div class="container">
  <?php
  $ourabout = new WP_Query('category_name=mission-vision&posts_per_page=2');
  while ( $ourabout->have_posts() ) :
    $ourabout->the_post(); ?>
    <?php //if($post->ID === 40): ?>
    <!--<div id="mission">-->
      <h2 class="top_heading text-mt2"><?php the_title();?></h2>
      <?php the_content(); ?>
  <!--</div>-->
  <?php //else: ?>
    <!--<div id="our-vision">-->
      <!--<h2 class="top_heading text-mt2"><?php the_title();?></h2>-->
      <?php //the_content(); ?>
    <!--</div>-->
    <?php //endif; ?>
  <?php
  endwhile; // End of the loop.
  wp_reset_query();
  ?>
</div>
</div>
</section>

<!--Founders / Team Section Info-->
<section class="row bgk_change" id="founders">
  <h2 class="top_heading">The Team</h2>
  <div class="container">
    <?php
    $args = array(
      'category_name' => 'team',
      'order' => 'ASC'
    );
    $team = new WP_Query($args);
    while ( $team->have_posts() ) :
      $team->the_post();?>
      <div class="row-founder">
        <div class="img-founder">
          <?php the_post_thumbnail();?>
        </div>
        <div class="p-founder">
          <h3 class="team-name"><?php the_title();?></h3>
          <?php the_content();?>
        </div>
      </div>
    <?php
    endwhile; // End of the loop.
    wp_reset_query();
    ?>
  </div>
</section>

<!--Frequently Asked Question-->
<section class="row">
<h2 class="top_heading">Frequently Asked Questions</h2>
<div class="faq-container">
  <div class="faq-bck">
    <div class="faq-show">
        What is Ghana Soccer Education Network?
    </div>
    <div class="faq-words">
      <p>Ghana Soccer Education Network is a US based 501(C)(3) , tax-exempt  non-profit organization that helps to identify and recruit prospective student athletes from High Schools and Universities in Ghana, as well as other African countries, into US Colleges.</p>
      <p>It provides scholarship opportunities and mentoring for the student athletes, allowing them to pursue their education at the best universities while also competing in collegiate athletics.</p>
      <p>We strive to provide opportunity to young, talented youth with academic dreams and goals as well as a passion for soccer, who do not have the resources necessary to get the opportunity to combine their soccer talent alongside their education.</p>
    </div>
  </div>
  <div class="faq-bck">
    <div class="faq-show">
        How do I Prepare for the SAT/TOEFL Test?
    </div>
    <div class="faq-words">
      <p>
        One of the most important services Ghana Soccer Education Network provide is to educate and prepare prospective student athletes for the SAT/TOEFL. By educating and preparing High school student athletes and their families about the sports recruiting process and importance of the SAT/TOEFL, we enhance their chances of receiving college academic and athletic scholarship offers.
      </p>

      <p>
        We will accomplish this service by providing organized classes and after school programs run by standardized test experts. With access to preparation books and teaching methods otherwise unavailable to these student athletes, these classes and after school programs will allow them more opportunity to better their education, enhance their chances of receiving academic and athletic scholarships, and ultimately better their lives.
      </p>
    </div>
  </div>
  <div class="faq-bck">
    <div class="faq-show" id="no-border">
        When is the Organize Showcase Games?
    </div>
    <div class="faq-words">
      <p>
        Showcase games are organized regularly in Ghana throughout the year. It provides a good opportunity for prospective student athletes in Ghana and other West African countries to audition their talent in front of several American College coaches. Ghana Soccer Education Network will allow American college coaches looking to visit ghana and other west african countries an efficient and effective opportunity to see prospective student athletes play in person. Showcase games serves as a platform where most talents are scouted, so it is a great opportunity for college coaches to see the wealth of talent at display.
      </p>
    </div>
  </div>
</div>
</section>
<!--Resgiter-->
<section class="row bgk_change" id="action">
  <h3 class="sub_heading">
      Ready to get recruited?
  </h3>
      <a href="<?= site_url('/application');?>" class="btn btn-primary">Register Today</a>
</section>
<?php get_footer();?>
