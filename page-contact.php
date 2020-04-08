<?php
/*
Template Name: contact
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header' ) ); ?>
<?php get_sidebar(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<ul class="projectList absoluteDiv">
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


<article id="page">
	
	<div id="pageContent" class="firstCol">
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>	
	</div>		

</article>
<?php endwhile; ?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>