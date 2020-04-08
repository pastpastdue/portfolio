<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file 
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php get_sidebar(); ?>
<?php

	$featuredargs = array(
		'category_name' => 'featured',
		'orderby' => 'title',
		'order' => 'ASC'
	);
	
	$featured = new WP_Query($featuredargs);

?>

		<section id="allWork">
				<ul class="projectList home">
					<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/name' ) ); ?>
					<?php // Starkers_Utilities::get_template_parts( array( 'parts/shared/foursquare' ) ); ?>
					<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/lastfm' ) ); ?>
					<?php // Starkers_Utilities::get_template_parts( array( 'parts/shared/search' ) ); ?> 		  
<?php while ($featured->have_posts()) : $featured->the_post(); ?>
					<li class="projectPost"> 
						<a href="<?php the_permalink(); ?>" title="<?php if (in_category('redact')) {?>█████████████<?php } else { ?><?php the_title(); } ?>"> 
							<div class="projectThumb">
								<div>
								<?php the_post_thumbnail(); ?>
								</div>
							</div>
							<div class="projectDetails"> 
								<h2><?php if (in_category('redact')) {?><span class="redact">█████████████</span><?php } else { ?><?php the_title(); } ?></h2>
								<h3> 
								<?php
								$posttags = get_the_tags();
								$count=0;
								if ($posttags) {
								  foreach($posttags as $tag) {
								    $count++;
								    if (1 == $count) {
								      echo $tag->name . ' ';
								    }
								  }
								}
								?>
								</h3>
							</div> 
						</a> 
					</li>
<?php endwhile; ?>
				</ul>
		</section>


<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>