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
	<div id="banner" class="section_style">
		<div class="container">
			<h1><?= get_the_title(); ?></h1>
		</div>
	</div>
</div><!--closses the showcase div-->

	<div id="primary" class="content-area">
		<div class="container">
			<main id="main" class="site-main">
				<section class="sec-main">
					<div class="single-post-sec">
						<?php
							while ( have_posts() ) :
								the_post(); ?>
								<div class="meta-info">
									<div class="meta-time">
										<?= the_time('F jS, Y');?>
									</div>
									<div class="share-link">
										Share
										<ul class="social-icons">
											<li>Facebook</li>
										</ul>
									</div>
								</div>
						<?php	the_content();
							endwhile; // End of the loop.
						?>
					</div>
				</section>
			</main><!-- #main -->
		</div>

		<!--Related Posts area-->
		<div class="related-post bgk_change">
			<div class="container">
				<h2 class="related-header">You might also like</h2>
				<div class="related-grid">
					<?php
						//for use in the loop, list 5 post titles related to first tag on current post
						$tags = wp_get_post_tags($post->ID);
						if ($tags) {

							$all_tags = [];
							foreach($tags as $tag) {
								$all_tags[] = $tag->slug.',';
							}

							$args=array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'orderby' => 'rand',
							'tag_slug__in' => $all_tags,
							'post__not_in' => array($post->ID),
							'posts_per_page'=>3,
							'ignore_sticky_posts'=>1
							);
							$my_query = new WP_Query($args);

							if( $my_query->have_posts() ) {
								while ($my_query->have_posts()) : $my_query->the_post(); 
									get_template_part( 'template-parts/content', 'related' );
								?>
								<?php
								endwhile;
							}
							wp_reset_postdata();
						} else {
							$news = new WP_Query(array(
								'post_type' => 'post',
								'post_status' => 'publish',
								'category_name'=>'news',
								'orderby' => 'rand',
								'posts_per_page'=> 3,
								'post__not_in' => array($post->ID),
							));

							if( $news->have_posts() ) {
								while ($news->have_posts()) : $news->the_post(); 
									get_template_part( 'template-parts/content', 'related' );
								?>
								<?php
								endwhile;
							}
							wp_reset_postdata();
						}
					?>
				</div>
			</div>
		</div><!--end of the related Posts-->
	</div><!-- #primary -->

<?php
get_footer();
