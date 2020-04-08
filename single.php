<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
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

	 $video = array(
	   'post_type' => 'attachment',
	   'orderby' => 'menu_order',
	   'order' => 'ASC',
	   'numberposts' => -1,
	   'post_mime_type' => 'video/mp4',
	   'post_status' => null,
	   'post_parent' => $post->ID
	 );

	 $video2 = array(
	   'post_type' => 'attachment',
	   'orderby' => 'menu_order',
	   'order' => 'ASC',
	   'numberposts' => -1,
	   'post_mime_type' => 'video/ogg',
	   'post_status' => null,
	   'post_parent' => $post->ID
	 );

	$videos = get_posts( $video );
	$images = get_posts( $image );
	$videos2 = get_posts( $video2 );

	if ( $videos ) { ?>
			<li class="video-container">
				<video class="video" preload="auto" width="840" height="473">
	<?php foreach ( $videos as $attachment ) { ?>
				<?php echo '<source src="'.wp_get_attachment_url( $attachment->ID ).'"type="video/mp4" />'; ?>
	<?php } ?>
	<?php foreach ( $videos2 as $attachment ) { ?>
				<?php echo '<source src="'.wp_get_attachment_url( $attachment->ID ).'"type="video/ogg" />'; ?>
	<?php } ?>
				</video>
			</li>
	<?php }
	if ( $images ) {
		foreach ( $images as $attachment ) {
			echo '<li>';
			echo wp_get_attachment_image( $attachment->ID, 'displayimage' );
			echo '</li>';
		}
	}

	?>
	</ul>
	<?php if (in_category('redact')) { ?>
	<div id="projectContent" class="redact">
		<div id="projectSummary">
			<h2>Project Currently Under NDA</h2>
			<p>███████████████████████████████████████████████████████████████████████████
			███████████████████████████████████████████████████████████████████████████
			███████████████████████████████████████████████████████████████████████████
			███████████████████████████████████████████████████████████████████████████</p>
		</div>
		<div id="projectInfo">
			<div class="processLinkBox">
				<p><?php if (get_field('process_link') != "") { ?><a href="<?php the_field('process_link'); ?>" title="process">view process</a><?php } else { ?>&nbsp;<?php } ?></p>
			</div>
			<div class="infoBox">
				<h4>███████████</h4>
				<p>███████████ ███████████ ███████████</p>
			</div>
			<div class="infoBox">
				<h4>███████████</h4>
				<p>███████████ ███████████ ███████████</p>
			</div>
		</div>
	</div>
	<?php } else { ?>
	<div id="projectContent">
		<div id="projectSummary">
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
		</div>
		<div id="projectInfo">
			<div class="processLinkBox">
				<p><?php if (get_field('process_link') != "") { ?><a href="<?php the_field('process_link'); ?>" title="process">view process</a><?php } else { ?>&nbsp;<?php } ?></p>
			</div>
			<div class="infoBox">
				<h4>Information</h4>
				<p><?php the_field('project_information'); ?></p>
			</div>
			<div class="infoBox">
				<h4>Tags</h4>
				<p><?php the_tags('', ', ', ''); ?></p>
			</div>
		</div>
	</div>		<?php } ?>

</article>
<?php endwhile; ?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
