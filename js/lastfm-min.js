(function($) {
	$.fn.lastFM=function(options){
		var defaults= {
			number:1,
			username:'ericcroskey',
			apikey:'0584d1f910be3bbf4615f3ba1496f4bf',
			onComplete: function(){}
		},
			settings=$.extend({},
			defaults,options
		);

			var lastUrl='https://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user='+settings.username+'&api_key='+settings.apikey+'&limit='+settings.number+'&format=json&callback=?';
			var $this=$(this);
			var container=$this.html();



			$this.children(':first').remove();

			this.each(function(){
				$.getJSON(lastUrl,
				function(data){
					$.each(data.recenttracks.track,function(i,item) {

						song=item.name;
						artist=item.artist['#text'];
						album=item.album['#text'];

						$this.append(container);

						var $current=$this.children(':eq('+i+')');

						$current.find('[class=lfm_song]').append(song);
						$current.find('[class=lfm_artist]').append(artist);
						$current.find('[class=lfm_album]').append(album);

						if(item.hasOwnProperty("@attr")){
							$current.find('[class=lfm_date]').append('Listening now!');
						} else {
							var mmToMonth = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

							d=item.date['uts'];
							var dateMult = new Date(d*1000);
							var mm = mmToMonth[dateMult.getMonth()];
							var date = dateMult.getDate();
							var year = dateMult.getFullYear();

							var hours = dateMult.getHours();
							var minutes = dateMult.getMinutes();
							var ampm = hours >= 12 ? 'pm' : 'am';
							hours = hours % 12;
							hours = hours ? hours : 12; // the hour '0' should be '12'
							minutes = minutes < 10 ? '0'+minutes : minutes;
							var strTime = hours + ':' + minutes + ' ' + ampm;

							$current.find('[class=lfm_date]').append(mm).append(' ' + date).append(', ' + year).append(', ' + strTime);
						}

						if(i==(settings.number-1)){
							settings.onComplete.call(this);
						}

				});
			});
		});
};

function stripslashes(str){return(str+'').replace(/\0/g,'0').replace(/\\([\\'"])/g,'$1');}})(jQuery);

	jQuery(document).ready(function(){
		jQuery('#lastfm').lastFM({
			username: 'ericcroskey',
			apikey: '0584d1f910be3bbf4615f3ba1496f4bf',
			number: 1,
			onComplete: function(){
				//Done
			}
		});
	});
