	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="http://code.jquery.com/jquery-1.9.1.min.js"><\/script>')</script>

	<?php if(is_home() || is_single() || is_category() || is_page()) { ?>
		<script type="text/javascript" defer src="http://2020.ericcroskey.com/js/lastfm-min.js"></script>
	<?php } if (is_single()) { ?>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/video-player.js"></script>
	<?php } if (is_page('information')) {?>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.instagram.js"></script>
	<?php } ?>

		<script type="text/javascript" defer src="<?php echo get_template_directory_uri(); ?>/js/site.js"></script>
		<script type="text/javascript" defer src="<?php echo get_template_directory_uri(); ?>/js/retina-1.1.0.min.js"></script>

	  <!--[if lt IE 9 ]>
	    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
	    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	  <![endif]-->

	<?php if (is_user_logged_in()) { } else { ?>

		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-17303073-1', 'auto');
		  ga('send', 'pageview');

		</script>

	<?php } ?>

	<?php wp_footer(); ?>

	</div>
	</body>
</html>
