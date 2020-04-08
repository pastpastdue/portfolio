					<li class="post dataPost">
						<a <?php if (is_page() || is_tag() || is_single() ) { ?>href="/" title="Get more data!"<?php } elseif (is_home()) { ?>href="//foursquare.com/user/4875787" title="Where have I been recently?"<?php } ?>>
						<h1><?php if (is_page() || is_tag() || is_single() ) { ?>ERIC CROSKEY.<br/>LIKES TO HANG.<?php } elseif (is_home()) { ?>RECENT LOCATION<br/> AND CITY<?php } ?></h1>
						<p class="orange-divider">---------------------------</p>
						<ul id="foursquare">
							<li>
						<?php 
							require_once 'foursquare_scrape.php';
							$fq = new fourSquare("OTFBIYDRR1PLK3PCKWRF5HGHTB5MRHOSTRBIGLM1ZA0JTUQP"); 
						?>
								<h4><?php echo $fq->venueName ?></h4>
								<h4><?php echo $fq->venueCity . ", " . $fq->venueState ?></h4>
								<h5><?php echo $fq->venueType ?> (<?php echo $fq->venueCat ?>)</h5>
								<h6><?php echo $fq->date ?></h6>
    						</li>					
						</ul>
						</a>
					</li> 