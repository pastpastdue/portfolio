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
							<h1>ERIC CROSKEY.<br/>WORK BY TAGS.</h1>
							<p class="blue-divider">---------------------------</p>
							<p class="summary">The tagging system allows users to filter projects by type of work created throughout Eric's growing design career.</p>							
						</a>
					</li>	
					</ul>
			<div class="projectContainer">
<?php
//Get terms for this taxonomy - orders by name ASC by default
$terms = get_terms('post_tag');

//Loop through each term
foreach($terms as $term):

   //Query posts by term. 
   $args = array(
    'orderby' => 'title', //As requested in comments
    'tax_query' => array(
        array(
            'taxonomy' => 'post_tag',
            'field' => 'slug',
            'terms' => array($term->slug)
        )
     ));
    $tag_query = new WP_Query( $args );

    //Does tag have posts?
    if($tag_query->have_posts()):

        //Display tag title
      echo '<div class="listContainer">';
      echo '<h2>'.esc_html($term->name).'</h2>';
      echo '<ul class="textList">';
        //Loop through posts and display
        while($tag_query->have_posts()):$tag_query->the_post(); ?>
		<li> 
			<a href="<?php the_permalink(); ?>" title="<?php if (in_category('redact')) {?>█████████████<?php } else { ?><?php the_title(); } ?>"> 
				<?php if (in_category('redact')) {?><span class="redact">█████████████</span><?php } else { ?><?php the_title(); } ?>
			</a> 
		</li>
        <?php endwhile;
    echo '</ul>';
    echo '</div>';

    endif; //End if $tag_query->have_posts
    wp_reset_postdata();
 endforeach;//Endforeach $term

?>

			</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>