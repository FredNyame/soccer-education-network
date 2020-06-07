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
										<p>Share</p>

										<ul class="social-logos">
											<li>
												<a href="https://www.facebook.com/sharer/sharer.php?u=<?= get_permalink();?>" target="_blank">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.779 42.239"><defs><style>.a{fill:#fff;}</style></defs><path class="a" d="M6.328,42.239V23.347H0V15.839H6.328V9.924C6.328,3.5,10.254,0,15.988,0a53.123,53.123,0,0,1,5.791.3V7.012H17.8c-3.118,0-3.721,1.485-3.721,3.655v5.173h7.037l-.965,7.507H14.082V42.239"/></svg>
												</a>
											</li>
											<li>
												<a href="https://twitter.com/intent/tweet?text=%22<?php echo the_title(); ?>%22%20<?php echo get_permalink(); ?>" target="_blank">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50.574 41.075"><defs><style>.a{fill:#fff;}</style></defs><g transform="translate(-454.949 216)"><path class="a" d="M45.375,58.319c.032.449.032.9.032,1.348,0,13.7-10.429,29.491-29.491,29.491A29.291,29.291,0,0,1,0,84.5a21.443,21.443,0,0,0,2.5.128A20.758,20.758,0,0,0,15.371,80.2,10.383,10.383,0,0,1,5.68,73.016a13.071,13.071,0,0,0,1.958.16,10.962,10.962,0,0,0,2.728-.353A10.366,10.366,0,0,1,2.054,62.651v-.128a10.439,10.439,0,0,0,4.685,1.316A10.381,10.381,0,0,1,3.53,49.975,29.462,29.462,0,0,0,24.9,60.822a11.7,11.7,0,0,1-.257-2.375,10.375,10.375,0,0,1,17.938-7.092,20.407,20.407,0,0,0,6.578-2.5,10.337,10.337,0,0,1-4.557,5.712,20.779,20.779,0,0,0,5.969-1.6A22.281,22.281,0,0,1,45.375,58.319Z" transform="translate(454.949 -264.082)"/></g></svg>
												</a>
											</li>
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
