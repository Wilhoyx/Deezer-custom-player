<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ekipamax Kahloyx's Web Player</title>
	<script type="text/javascript" src="javascripts/jquery.min.js"></script>
	<script type="text/javascript" src="javascripts/jquery-ui.min.js"></script>

	<script type="text/javascript" src="javascripts/dz-v00202681.js"></script>

	<link rel="stylesheet" href="styles.css">

</head>

<body>
	<div align="center"><h3>Welcome to The Ekipamax Web Player</h3>
	<?php echo date('d-m-Y H:i:s'); ?>
	<br/><p>Warning, les mix artistes ne sont pas disponibles</p></div>

	<div id="dz-root"></div>

	<div id="player" style="width:100%;" align="left"></div>
	<br/>
	<div id="controlers">

		<input type="button" onclick="DZ.player.playAlbum(41273071); return false;" value="Tao H : Dreamer"/> <! ––Comment-1 Test avec deux albums perso––>
		<input type="button" onclick="DZ.player.playAlbum(13342047); return false;" value="Mexican Stepper : Piramide del Sol"/>
		<input type="button" onclick="DZ.player.playPlaylist(7423121784); return false;" value="Boris Brejcha : Melodic Techno Playlist"/>
		<input type="button" onclick="DZ.player.playAlbum(10536204); return false;" value="Billx : Fractal"/>
		<input type="button" onclick="DZ.player.playRadio(2985821, 'Darktek'); return false;" value="Darktek : Mix artiste [BETA]"/>
		<input type="button" onclick="DZ.player.playRadio(4244987, 'Dr.Peacock'); return false;" value="Dr Peacock : Mix artiste [BETA]"/>
		<input type="button" onclick="DZ.player.playRadio(148492, 'Mandragora'); return false;" value="Mandragora : Mix artiste [BETA]"/>
		<input type="button" onclick="DZ.player.playRadio(6294678); return false;" value="Under Black Helmet : Mix artiste [BETA]"/>
		<input type="button" onclick="DZ.player.playRadio(5384533); return false;" value="Charlotte De Witte : Mix artiste [SO FRAICHE PUTAIN]"/>
		<input type="button" onclick="DZ.player.playPlaylist(2551411984); return false;" value="Sound System : A Deezer playlist"/>
		<input type="button" onclick="DZ.player.playPlaylist(6813211484); return false;" value="Kahloyx : Playlist fofolle par mes soins"/>
		<br/>
		<input type="button" onclick="DZ.player.play(); return false;" value="play"/>
		<input type="button" onclick="DZ.player.pause(); return false;" value="pause"/>
		<input type="button" onclick="DZ.player.prev(); return false;" value="prev"/>
		<input type="button" onclick="DZ.player.next(); return false;" value="next"/>
		<br/>
		<input type="button" onclick="DZ.player.setVolume(20); return false;" value="set Volume 20"/>
		<input type="button" onclick="DZ.player.setVolume(100); return false;" value="set Volume 100"/>

		<br/><br/><br/>
	</div>
	<div id="slider_seek" class="progressbarplay" style="">
		<div class="bar" style="width: 0%;"></div>
	</div>
	<script>
	$(document).ready(function(){
		$("#controlers input").attr('disabled', true);
		$("#slider_seek").click(function(evt,arg){
			var left = evt.offsetX;
			DZ.player.seek((evt.offsetX/$(this).width()) * 100);
		});
	});
	function event_listener_append() {
		var pre = document.getElementById('event_listener');
		var line = [];
		for (var i = 0; i < arguments.length; i++) {
			line.push(arguments[i]);
		}
		pre.innerHTML += line.join(' ') + "\n";
	}
	function onPlayerLoaded() {
		$("#controlers input").attr('disabled', false);
		event_listener_append('player_loaded');
		DZ.Event.subscribe('current_track', function(arg){
			event_listener_append('current_track', arg.index, arg.track.title, arg.track.album.title);
		});
		DZ.Event.subscribe('player_position', function(arg){
			event_listener_append('position', arg[0], arg[1]);
			$("#slider_seek").find('.bar').css('width', (100*arg[0]/arg[1]) + '%');
		});
	}
	DZ.init({
		appId  : '403544',
		channelUrl : 'http://developers.deezer.com/examples/channel.php',
		player : {
			container : 'player',
			cover : true,
			playlist : true,
			width : 650,
			height : 300,
			onload : onPlayerLoaded
		}
	});
	DZ.api('/user/me', function(response){
	console.log("My name", response.name);
});
</script><br/>
event_listener : <br/>
<pre id="api" style="height:100px;overflow:auto;"></pre>
</body>
</html>
