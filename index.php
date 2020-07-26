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
		'orderby' => 'date',
		'order' => 'DESC'
	);

	$featured = new WP_Query($featuredargs);

?>
		<section id="introduction">

			<div class="statement">
				<h1 class="pageTitle">
				 Hi, I'm Eric.
				</h1>
				<h2>I'm a systems-minded product design lead with a penchant for inclusive design, design strategy, and code.</h2>
	 		</div>

		</section>

		<section id="editorialLayout">
			<h1 class="pageTitle">
				About Me
			</h1>
			<div>
				<h3>Select Clients</h3>
				<ul class="editorialList">
					<li>Microsoft</li>
					<li>Amazon</li>
					<li>Facebook</li>
					<li>Eli Lilly</li>
					<li>Arizona State University</li>
					<li>Bloomberg Philanthropies</li>
					<li>The Ballmer Group</li>
					<li>USAFacts</li>
					<li>Dreambox Learning</li>
					<li>Samsung</li>
					<li>Thales</li>
				</ul>
			</div>

		 <div>

			 <div>
				 <h3>What I Do</h3>
				 <ul class="editorialList">
					 <li>Human-centered design</li>
					 <li>UX design</li>
					 <li>Visual design</li>
					 <li>Accessibility design</li>
					 <li>Design strategy + envisioning</li>
					 <li>Code</li>
					 <li>Business strategy</li>
					 <li>User research</li>
					 <li>Provide mentorship</li>
				 </ul>
			 </div>

		 </div>

		 <div>

			<h3>Background</h3>
			<p>My work spans many contexts and applications. Some of it's on airplanes, some is in classrooms, some is on feature phones in Africa. Some envisioned the future of code management. My most recent work includes a data platform that's in the hands of lawmakers on Capitol Hill and data wonks across the US, and another that enabled a major medical company to help people with diabetes learn more about their condition.

		 </div>
	 	</section>

		<section id="allWork">
				<h1 class="pageTitle">
				 Featured Work
				</h1>
				<ul class="projectList home">
					<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/lastfm' ) ); ?>
					<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/confidential' ) ); ?>
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
