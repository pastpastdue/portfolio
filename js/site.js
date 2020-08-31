// SITE HEIGHT

	jQuery(document).ready(function($) {

		jQuery('#siteContainer').height( jQuery(window).height() - 16 );

		$(window).resize(function($) {
			jQuery('#siteContainer').height( jQuery(window).height() - 16 );
		});

		jQuery('#introduction').height( jQuery(window).height() - 16 );

		$(window).resize(function($) {
			jQuery('#introduction').height( jQuery(window).height() - 16 );
		});


// HOMEPAGE LIST

		$('.projectList li.projectPost').eq(11).before($('li.dataPost').eq(2));
		$('.projectList li.projectPost').eq(1).before($('li.dataPost').eq(1));
		$('.projectList li.projectPost').eq(6).before($('li.dataPost').eq(0));

// FIXED BOX

		$("#siteContainer").scroll(function() {
		    if ($(this).scrollTop() < 1) {
		        $('.fixedDiv').show();
		    } else {
		        $('.fixedDiv').hide();
		    }
		});

	});

// COLOR SHIFTS

	(function() {
		var d = new Date();
		var currHour = d.getHours();
		if (currHour >= 0 && currHour <= 4) {
		   document.getElementById("siteContainer").style.borderColor = "#4848d8";
		} else if (currHour >= 4 && currHour < 5) {
			document.getElementById("siteContainer").style.borderColor = "#9249b9";
		} else if (currHour >= 5 && currHour < 6) {
			document.getElementById("siteContainer").style.borderColor = "#be4d99";
		} else if (currHour >= 6 && currHour < 7) {
			document.getElementById("siteContainer").style.borderColor = "#e1517a";
		} else if (currHour >= 7 && currHour < 17 ) {
			document.getElementById("siteContainer").style.borderColor = "#ff5759";
		} else if (currHour >= 17 && currHour < 18 ) {
			document.getElementById("siteContainer").style.borderColor = "#e1517a";
		} else if (currHour >= 18 && currHour < 19 ) {
			document.getElementById("siteContainer").style.borderColor = "#be4d99";
		}	else if (currHour >= 19 && currHour < 20 ) {
			document.getElementById("siteContainer").style.borderColor = "#9249b9";
		} else if (currHour >= 20 && currHour < 24 ) {
			document.getElementById("siteContainer").style.borderColor = "#4848d8";
		}
	})();
