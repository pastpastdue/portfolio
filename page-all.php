<?php
/*
Template Name: all-work
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php get_sidebar(); ?>
<?php
	
	$allprojectargs = array(
		'orderby' => 'title',
		'order' => 'asc'
	);
	
	$allprojects = new WP_Query($allprojectargs);
?>

		<section id="allWork">
				<ul class="projectList">
					<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/name' ) ); ?>
					<?php // Starkers_Utilities::get_template_parts( array( 'parts/shared/foursquare' ) ); ?>
					<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/lastfm' ) ); ?>
					<?php // Starkers_Utilities::get_template_parts( array( 'parts/shared/search' ) ); ?> 		  
<?php while ($allprojects->have_posts()) : $allprojects->the_post(); ?>
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