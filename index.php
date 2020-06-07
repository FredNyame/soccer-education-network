<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gsen
 */

get_header();
?>
	<div id="banner" class="section_style">
		<div class="container">
			<?php if(is_category()): ?>
				<h2>BLOG</h2>
				<h1><?= ucwords(get_the_archive_title()) ;?></h1>
			<?php else: ?>
				<h1><?php single_post_title(); ?></h1>
			<?php endif; ?>
		</div>
	</div>
</div>

<div class="container">
	<?php
	if ( have_posts() ) : ?>
	<div class="main-blog">
		<div class="blog-container">
		
		<?php /* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/*
				* Include the Post-Type-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Type name) and that will be used instead.
				*/
			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; ?>
		
		<div class="pagination-wrapper">
      <?php echo the_posts_pagination(['screen_reader_text' => __(' ')]); ?>
    </div>

	<?php else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
		</div><!--end of blog container-->
	</div>
</div>

<?php
//get_sidebar();
get_footer();
