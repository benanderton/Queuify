var sp = getSpotifyApi(1);
var models = sp.require('sp://import/scripts/api/models');
var views = sp.require("sp://import/scripts/api/views");
var player = models.player;

exports.init = init;
justChangedSong = false;

function init() {

	$.getJSON("http://cue.local/tracks/gettrack", function(data){
		player.play(data.trackid);
	});

	player.observe(models.EVENT.CHANGE, function (e) {


		// Only update the page if the track changed
		if (e.data.curtrack == true && !justChangedSong) {
				$.getJSON("http://cue.local/tracks/gettrack", function(data){
					player.play(data.trackid);
					justChangedSong = true;
				});				
		} else  if (justChangedSong) {
			justChangedSong = false;
		}
	});	

	
}
