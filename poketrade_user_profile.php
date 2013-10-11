<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
			<meta charset="utf-8">
			<title>Poke-Trade</title>
			<link href="../css/style.css" rel="stylesheet" type="text/css">
			<link href="../css/trainer_card_style.css" rel="stylesheet" type="text/css">
			<link href="../css/jquery.kwicks.css" rel="stylesheet" type="text/css">
			<script src='../js/jquery-1.8.1.min.js' type='text/javascript'></script>
			<link href='http://fonts.googleapis.com/css?family=Geo|Montserrat:400,700|Carrois+Gothic+SC|Press+Start+2P' rel='stylesheet' type='text/css'>
			<script src='../js/jquery.kwicks.js' type='text/javascript'></script>
			<script type="text/javascript">
				var idNumber = <?php echo $_SESSION['user_id']; ?>;
			</script>
			<script src='../js/poketrade_user_profile.js' type='text/javascript'></script>
			<script src='../js/pokemon.js' type='text/javascript'></script>
			<link href='http://fonts.googleapis.com/css?family=Press+Start+2P' rel='stylesheet' type='text/css'>

	</head>
	<body>
			<div id="header">
				<img id="banner" src="../img/banner.png">
				<a href="poketrade_faq.html"><img id="unownhelp" src="../img/unownhelp.png" alt="Poké-Trade Help Button"></a>
				<a href="poketrade_user_profile.html"><img id="poketradelogo" src="../img/poketradelogo.jpg" alt="Poké-Trade Home Button"></a>
				<img id="pokeballheader" src="../img/pokeballheader.png" alt="Pokéball Header">
				<div id="navbar">
				<ul id='example' class='kwicks kwicks-horizontal'>
					<a href='poketrade_user_profile.html'><img id="trainerpage" src="../img/trainerpage.png"><li></li></a>
					<a href='poketrade_search.html'><img id="searchpage" src="../img/search.png"><li></li></a>
					<a href='poketrade_trades.html'><img id="tradespage" src="../img/tradespage.png"><li></li></a>
					<a href='poketrade_settings.html'><img id="settingspage" src="../img/settingspage.png"><li></li></a>
				</ul>
		
				<script type='text/javascript'>
					$(function() {
						$('.kwicks').kwicks({
							size: 125,
							maxSize : 250,
							spacing : 5,
							behavior: 'menu'
						});
					});
				</script>
				<img id="pokeballheader2" src="../img/pokeballheader2.png" alt="Pokéball Header">
				</div id="navbar">
			</div>

			<div id="page">
				<div id="usertrainercarddiv">
					<div id="badges">
						<img id="pewterbadge" class="badgepics" src="../img/pewterbadge.png" alt"Pewter City Boulder Badge">
						<img id="ceruleanbadge" class="badgepics" src="../img/ceruleanbadge.png" alt"Cerulean City Cascade Badge">
						<img id="vermillionbadge" class="badgepics" src="../img/vermillionbadge.png" alt"Vermillion City Thunder Badge">
						<img id="celadonbadge" class="badgepics" src="../img/celadonbadge.png" alt"Celadon City Rainbow Badge">
						<img id="fuschiabadge" class="badgepics" src="../img/fuschiabadge.png" alt"Fuchsia City Soul Badge">
						<img id="saffronbadge" class="badgepics" src="../img/saffronbadge.png" alt"Saffron City Marsh Badge">
						<img id="cinnabarbadge" class="badgepics" src="../img/cinnabarbadge.png" alt"Cinnabar Island Volcano Badge">
						<img id="viridianbadge" class="badgepics" src="../img/viridianbadge.png" alt"Viridian City Earth Badge">
					</div>

					<div class="usertopsix">
						<div id="usertopsix1"><img id="pokemon1" src="../img/pokemon/noPokemon.png" alt="User Pokémon 1"></div>
						<div id="usertopsix2"><img id="pokemon2" src="../img/pokemon/noPokemon.png" alt="User Pokémon 2"></div>
						<div id="usertopsix3"><img id="pokemon3" src="../img/pokemon/noPokemon.png" alt="User Pokémon 3"></div>
						<div id="usertopsix4"><img id="pokemon4" src="../img/pokemon/noPokemon.png" alt="User Pokémon 4"></div>
						<div id="usertopsix5"><img id="pokemon5" src="../img/pokemon/noPokemon.png" alt="User Pokémon 5"></div>
						<div id="usertopsix6"><img id="pokemon6" src="../img/pokemon/noPokemon.png" alt="User Pokémon 6"></div>
					</div> 
					<div id="userprofilepic"></div>
					<img id="usertrainercard" src="../img/temp.jpg" alt="User Trainer Card">
				</div>
				<div id="pokemoninventory"></div> 
				<div id="pokemoninfo">
					<img src="../img/pokemoncard.png">
					<h2 id="speciesname"></h2>
					<h2 id="pokemonnickname"></h2>
					<h2 id="originaltrainer"></h2>
					<h2 id="level"></h2>
					<h2 id="firstmove"></h2>
					<h2 id="secondmove"></h2>
					<h2 id="thirdmove"></h2>
					<h2 id="fourthmove"></h2>
					<h2 id="typeone"></h2>
					<h2 id="typetwo"></h2>
				</div>
				<img id="pokemonviewimage"> 
			</div>
	</body>
</html>