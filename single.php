<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package gsen
 */
$id = 'singlePost';
get_header();
?>
</div><!--closses the showcase div-->
	<div id="primary" class="content-area">
		<div class="container">
		<main id="main" class="site-main">
		<section class="sec-main">
		<div class="single-post-sec">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			//the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			/*if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;*/

		endwhile; // End of the loop.
		?>
		</div>
		<div class="sec-aside">
			<?php get_sidebar();?>
		</div>
		</section>
		</main><!-- #main -->
		</div>
		<!--Related Posts area-->
		<div class="related-post bgk_change">
			<div class="container">
				<h2 class="related-header">YOU MIGHT ALSO LIKE</h2>
				<div class="related-grid">
					<?php
						//for use in the loop, list 5 post titles related to first tag on current post
						$tags = wp_get_post_tags($post->ID);
						if ($tags) {
						$first_tag = $tags[0]->term_id;
						$args=array(
						'tag__in' => array($first_tag),
						'post__not_in' => array($post->ID),
						'posts_per_page'=>3,
						'caller_get_posts'=>1
						);
						$my_query = new WP_Query($args);

						if( $my_query->have_posts() ) {
						while ($my_query->have_posts()) : $my_query->the_post(); ?>
						<div class="related">
							<div class="related-img">
								<a href="<?php the_permalink();?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
							</div>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</div>
						<?php
						endwhile;
						}
						wp_reset_query();
						}
					?>
				</div>
			</div>
		</div><!--end of the related Posts-->
	</div><!-- #primary -->

<?php
get_footer();
