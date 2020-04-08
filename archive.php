<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts() 
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ): ?>

<?php if ( is_day() ) : ?>
<h2>Archive: <?php echo  get_the_date( 'D M Y' ); ?></h2>							
<?php elseif ( is_month() ) : ?>
<h2>Archive: <?php echo  get_the_date( 'M Y' ); ?></h2>	
<?php elseif ( is_year() ) : ?>
<h2>Archive: <?php echo  get_the_date( 'Y' ); ?></h2>								
<?php else : ?>
<h2>Archive</h2>	
<?php endif; ?>

<ol>
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
</ol>
<?php else: ?>
<h2>No posts to display</h2>	
<?php endif; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>