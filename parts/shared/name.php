					<li class="namePost">
						<a href="/" title="Want to view an overview of my work?">
							<h1>
							<?php if ( is_tag() ) { ?>WORK TAGGED<br/>
							WITH <?php single_tag_title(); ?>.</h1>
							<?php } else { ?>
							<?php bloginfo( 'name' ); ?><br/>
							<?php bloginfo( 'description' ); ?>
							</h1>
							<p class="blue-divider">---------------------------</p>
							<p class="summary">Seattle, WA via Detroit, MI. Interdisciplinary designer who works at the intersection of design, code, and research. </p>							
							<?php } ?>
						</a>
					</li>