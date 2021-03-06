<?php
/*
Template Name: information
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header' ) ); ?>
<?php get_sidebar(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<ul class="projectList absoluteDiv">
			<?php
			$input = array( 'parts/shared/name.php',
				'parts/shared/lastfm.php' );
				  $rand_keys = array_rand($input, 2);

					$image = array(
						'post_type' => 'attachment',
						'orderby' => 'menu_order',
						'order' => 'DESC',
						'numberposts' => -1,
						'post_mime_type' => 'image',
						'post_status' => null,
						'post_parent' => $post->ID
					);

					$images = get_posts( $image );


			?>
			<?php include($input[$rand_keys[0]]); ?>
			<?php foreach ( $images as $attachment ) {
				echo '<li class="projectPost"><div class="projectThumb"><div>';
				echo wp_get_attachment_image( $attachment->ID, 'displayimage' );
				echo '</div></div></li>';
			} ?>
		</ul>


<article id="page">

	<div id="pageContent" class="firstCol">
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
	</div>

</article>
<?php endwhile; ?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
