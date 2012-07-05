$(document).ready(function() {


	$('#toggle-more').hide();

	// On key up start a timer for 1 second, after 1 second fetch track results
	// Saves making excessive queries to the Spotify Search API
	$('#SpotifyTrackArtist').keyup(function() {
		clearTimeout($.data(this, 'timer'));
		var wait = setTimeout(fetchTrackResults, 1000);
		$(this).data('timer', wait);
	});

	$('#SpotifyTrackArtist').keypress(function(event) {
	    if (event.keyCode == 13) {
	        event.preventDefault();
	    }
	});

	$('#SpotifyTrackArtist').focus(function() {
		originalSearchField = $(this).attr('value');
		$(this).attr('value', '');
	});

	$('#SpotifyTrackArtist').blur(function() {
		if($(this).attr('value') == '') {
			$(this).attr('value', originalSearchField);
		}
	});

	$('#results').on('click', 'a', function(event){
		addTrack($(this).attr('href'), $(this).parent());
		return false;
	});

	$('#toggle-more').click(function() {
		$('#results').attr('style', 'max-height: 100%; overflow: visible');
		$(this).hide();
		return false;
	});

});

// Takes the value of the search box and uses it to query the Spotify search API and populate a list of results
function fetchTrackResults() {

	$('#results').attr('style', 'max-height: 280px; overflow: hidden');

	// Empty the list and set its content to a loading notification		
	$('#results').empty();
	$('#results').append('Loading');
	$('#toggle-more').show();

	// Fetch results from the spotify search API
	$.getJSON("http://ws.spotify.com/search/1/track.json", { q: $('#SpotifyTrackArtist').val() },
		function(data){
			

			// Remove everything from the list
			$('#results').empty();

			// Add each result to the list
			$.each(data.tracks, function(key, value) {

				var trackInfo = new Object();
				trackInfo.artist = value.artists[0].name;
				trackInfo.album = value.album.name;
				trackInfo.date = value.album.released;
				trackInfo.title = value.name;
				trackInfo.href = value.href;

				$('#results').append('<li><a href="' + trackInfo.href + '"><span class="artist">' + trackInfo.artist + '</span> - <span class="title">' + trackInfo.title + '</span> <span class="album-and-year"><span class="album">' + trackInfo.album + '</span>, <span class="year">' + trackInfo.date +  '</span></span></a><a href="' + trackInfo.href + '" class="addtrack">+</a></li>');				
			});
		});
}

function addTrack(trackId, trackInfo) {

	// Fetch results from the spotify search API
	$.post("http://spotify.benanderton.co.uk/tracks/ajaxadd", { 
			trackid: trackId,
			artist: trackInfo.find('.artist').html(),
			title: trackInfo.find('.title').html(), 
			album: trackInfo.find('.album').html(),
			year: trackInfo.find('.year').html()
		},
		function(data){
			
			if(data == 'success') {
				trackInfo.fadeOut(1000);

				$.get("http://spotify.benanderton.co.uk/tracks/ajaxretrieve", function(data){
						$('#results-table').replaceWith(data);
				});

			} else if(data == 'duplicate') {
				trackInfo.attr('class', 'error');
				trackInfo.find('.addtrack').html('D');
			} else {
				alert('There was an error in adding your track to the playlist.');
			}
		});
}
