<?php
/*
Template Name: archive
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header' ) ); ?>
<?php get_sidebar(); ?>

		<section id="archiveWork">
					<ul class="projectList">
					<li class="namePost">
						<a href="/" title="E.C. PHONE HOME.">
							<h1>ERIC CROSKEY.<br/>WORK BY YEAR.</h1>
							<p class="blue-divider">---------------------------</p>
							<p class="summary">A timeline of all of Eric's work until this very moment. Starts in 2009, the year he enrolled in design school.</p>							
						</a>
					</li>	
					</ul>
			<div class="projectContainer">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<?php
$args=array(
    'orderby' => 'date',
    'order' => 'ASC',
    'posts_per_page' => 1,
    'caller_get_posts'=>1
);

$oldestpost =  get_posts($args);

$args=array(
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 1,
    'caller_get_posts'=>1
);
$newestpost =  get_posts($args);

if ( !empty($oldestpost) && !empty($newestpost) ) {
  $oldest = mysql2date("Y", $oldestpost[0]->post_date);
  $newest = mysql2date("Y", $newestpost[0]->post_date);

  for ( $counter = intval($newest); $counter >= intval($oldest); $counter = $counter - 1) {

    $args=array(
      'year'     => $counter,
      'posts_per_page' => -1,
      'orderby' => 'date',
      'order' => 'ASC',
      'caller_get_posts'=>1
    );

    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) {
      echo '<div class="listContainer">';
      echo '<h2> WORK IN '.$counter.'</h2>';
      echo '<ul class="textList">';
      while ($my_query->have_posts()) : $my_query->the_post(); ?>
		<li> 
			<a href="<?php the_permalink(); ?>" title="<?php if (in_category('redact')) {?>█████████████<?php } else { ?><?php the_title(); } ?>"> 
				<?php if (in_category('redact')) {?><span class="redact">█████████████</span><?php } else { ?><?php the_title(); } ?>
			</a> 
		</li>
       <?php endwhile;
    }
    echo '</ul>';
    echo '</div>';
  wp_reset_query();
  }
}
?>
			</div>
<?php endwhile; ?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>