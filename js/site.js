


	jQuery(document).ready(function($) {

		jQuery('#siteContainer').height( jQuery(window).height() - 16 );
	
		$(window).resize(function($) {
			jQuery('#siteContainer').height( jQuery(window).height() - 16 );
					
	});
	
		$('.projectList li.projectPost').eq(11).before($('li.dataPost').eq(2));
		$('.projectList li.projectPost').eq(1).before($('li.dataPost').eq(1));
		$('.projectList li.projectPost').eq(6).before($('li.dataPost').eq(0));
	
		$("#siteContainer").scroll(function() {
		    if ($(this).scrollTop() < 1) {
		        $('.fixedDiv').show();
		    } else {
		        $('.fixedDiv').hide();
		    }
		});	


/*
	var $lis = jQuery("ul.projectList");
	$lis.eq(Math.floor(Math.random()*$lis.length)).after().append('<li class="post">post</li>');
*/

	
	

	});



/*
	setTimeout(colorChange,3600000);

		function colorChange(){
			var time = new Date().getUTCHours() - 8;
			var val = -24 * Math.pow(time,2)+12;

			document.getElementById('thing').style.color = val;

	}
*/

/* 	new Date().getMinutes() + new Date().getHours() * 60 */
