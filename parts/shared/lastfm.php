					<li class="post dataPost">
						<a <?php if (is_home()) { ?>href="http://www.last.fm/user/ericcroskey" title="What else have I scrobbled recently?" <?php } else { ?>href="/" title="Get more data!"<?php } ?>>
						<h1><?php if (is_home()) { ?>Recently Scrobbled<br/>to Last.FM<?php } else { ?>ERIC CROSKEY.<br/>LIKES TO JAM.<?php } ?></h1>
						<p class="orange-divider">---------------------------</p>
						<ul id="lastfm">
							<li>
								<h4 class="lfm_artist"></h4>
								<h4 class="lfm_song"></h4>
								<h5 class="lfm_album">on </h5>
								<h6 class="lfm_date"></h6>
    						</li>		
						</ul>
						</a>
					</li>  