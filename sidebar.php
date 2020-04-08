<navigation id="globalNav" <?php if (is_home()) { } else {?>class="mobileHider" <?php }?>>
	<ul id="nav">
		<li class="currentlyViewing">
		<a href="/" class="selected"><span class="bold">Featured Work</span> <span class="floatRight blue bold">⋎</span></a>
			<ul>
				<li><a href="/">Featured Work</a></li>
				<li><a href="/all-work/">All Work</a></li>
				<li><a href="/work-by-year/">Work by Year</a></li>
				<li><a href="/tags/">Work by Tags</a></li>
			</ul>
		</li>
	</ul>

<?php wp_nav_menu( array('menu' => 'featured-nav' )); ?>

<?php wp_nav_menu( array('menu' => 'utility-nav' )); ?>

</navigation>


