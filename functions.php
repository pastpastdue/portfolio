<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================

	Required external files

	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================

	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme

	======================================================================================================================== */

	add_theme_support('post-thumbnails');

	set_post_thumbnail_size( 194, 126 );
	add_image_size( 'displayimage', 840, 999999 ); //840 pixels wide (and unlimited height)
	add_image_size( 'infoimage', 194, 126 );

	add_filter( 'post_displayimage_thumbnail_html', 'remove_width_attribute', 10 );
	add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
	add_filter( 'big_image_size_threshold', '__return_false' );

	function remove_width_attribute( $html ) {
	   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
	   return $html;
	}

	// register_nav_menus(array('primary' => 'Primary Navigation'));

	/* ======================================================================================================================== */


	function register_my_menus() {
		register_nav_menus(
	        array(
	            'featured-nav' => __( 'Primary Menu' ),
	            'utility-nav' => __( 'Secondary Menu' )
	        )
		);
	}
	add_action( 'init', 'register_my_menus' );



/*	Actions and Filters

	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================

	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );

	======================================================================================================================== */



	/* ========================================================================================================================

	Custom Login page

	======================================================================================================================== */

	function login_styling() {
	    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style-login.css' );
	}

	add_action( 'login_enqueue_scripts', 'login_styling' );


	//* Add custom message to WordPress login page

	function smallenvelop_login_message( $message ) {
	    if ( empty($message) ){
	        return "<p>A majority of my work is confidential; <a href='mailto:me@ericcroskey.com?subject=Can%20I%20have%20your%20password'>please reach out to me</a> to request a password to view it.</p>";
	    } else {
	        return $message;
	    }
	}

	add_filter( 'login_message', 'smallenvelop_login_message' );

	/* ========================================================================================================================

	Comments

	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}
