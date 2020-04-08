<?php
/**
 * The template used to display Tag Archive pages
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

<?php if ( have_posts() ): ?>
		<section id="allWork">
				<ul class="projectList">
					<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/name' ) ); ?>
					<?php while ( have_posts() ) : the_post(); ?>
					<li class="projectPost"> 
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>"> 
							<div class="projectThumb">
								<div>
								<?php the_post_thumbnail(); ?>
								</div>
							</div>
							<div class="projectDetails"> 
								<h2><?php the_title(); ?></h2>
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
<?php else: ?>
<h2>No posts to display in <?php echo single_tag_title( '', false ); ?></h2>
<?php endif; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>