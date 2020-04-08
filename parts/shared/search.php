				<?php $s = erq_shortcode(); ?>
				
				
					<li class="post dataPost">
						<a <?php if (is_home()) { ?>href="https://www.google.com/search?q=<?php echo $s; ?>" title="What have I searching for lately?"<?php } else { ?>href="/" title="Get more data!"<?php } ?>>
					
						<h1><?php if (is_home()) { ?>TOPICAL GOOGLE<br/>SEARCH RESULT<?php } else { ?>ERIC CROSKEY.<br/>SEARCHES GOOGLE.<?php } ?></h1>
						<p class="orange-divider">---------------------------</p>
						
						<?php echo wpws_get_content("http://www.bing.com/search?q=".$s."",'#results .sb_results li.sa_wr:eq(7)', '', 'user_agent=ecbot&on_error=error_show&striptags=<img><ul><a><strong>&removetags=<cite>')?>
						
						</a>
					</li> 