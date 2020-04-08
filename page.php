<?php
/*
Template Name: about
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header' ) ); ?>
<?php get_sidebar(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<ul class="projectList fixedDiv">
			<?php 
			$input = array( 'parts/shared/name.php', 
				// 'parts/shared/foursquare.php',
				'parts/shared/lastfm.php',
				//'parts/shared/search.php',
				//'parts/shared/foursquare.php', 
				'parts/shared/lastfm.php',
				//'parts/shared/foursquare.php',
				'parts/shared/lastfm.php' );
				  $rand_keys = array_rand($input, 2);
				  
			?>
			<?php include($input[$rand_keys[0]]); ?>
			
		</ul>


<article id="singlePost">
	<ul id="imageList">
	<?php

	 $image = array(
	   'post_type' => 'attachment',
	   'orderby' => 'menu_order',
	   'order' => 'ASC',
	   'numberposts' => -1,
	   'post_mime_type' => 'image',
	   'post_status' => null,
	   'post_parent' => $post->ID
	 );
			
	$images = get_posts( $image );

	if ( $images ) {
		foreach ( $images as $attachment ) {
			echo '<li>';
			echo wp_get_attachment_image( $attachment->ID, 'displayimage' );
			echo '</li>';
		}
	}
	
	?>
	</ul>
	
	<div id="projectContent">
		<div id="projectSummary">
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>	
		</div>
		<div id="projectInfo">
			<div class="infoBox">
				<h4>information</h4>
				<p><?php the_field('project_information'); ?></p>
			</div>
			<div class="infoBox">
				<h4>tags</h4>
				<p><?php the_tags('', ', ', ''); ?></p>
			</div>
		</div>
	</div>		

</article>
<?php endwhile; ?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>