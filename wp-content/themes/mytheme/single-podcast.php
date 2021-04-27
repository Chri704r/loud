<?php mesmerize_get_header(); ?>
<main id="main_podcast_single">
	<button class="back">Tilbage</button>
	<h1 class="podcast_navn">Podcasten</h1>
	<article id="podcast">
		<div class="top_pocast"><img src="" alt="" class="main_podcast_billede">
			<div class="ikoner">
				<img src="some_ikon/splogo.png" class="spotify, lyt_ikon" alt="spotify ikon">
				<img src="some_ikon/applepodcast.png" class="apple, lyt_ikon" alt="apple podcast ikon">
				<img src="some_ikon/podimo.png" class="podimo, lyt_ikon" alt="podimo ikon">
				<img src="some_ikon/googlepodcast.png" class="google, lyt_ikon" alt="google podcast ikon">
			</div>
		</div>
		<div class="bottom_podcast">
			<p class="beskrivelse"></p>
			<button>AFSPIL</button>
		</div>
	</article>

	<!-- Tilføj evt. senere nyeste afsnit
<article id="ny_podcast">
	<h2>Nyeste episode</h2>
	<div class="nyeste_container">
		<div class="col1"><img src="" alt="" class="nyeste_billede"></div>
	</div>
	<div class="col2">
		<h3 class="ny_episode">Episode navn</h3>
		<p class="ny_tekst"></p>
	</div>
</article>
-->

	<h2>Alle Episoder</h2>
	<section class="episode_section">
	</section>

	<template>
		<div class="episode_container">
			<img src="" alt="" class="podcast_billede">
			<div class="episode_fakta">
				<h3 class="episode_navn"></h3>
				<p class="episode_tekst"></p>
				<div class="mere_button"></div>
			</div>
		</div>
	</template>
</main>

<style>
	main {
		max-width: 1200px;
		margin: 0 auto;
		padding-left: 10px;
		padding-right: 10px;
	}

	.episode_container {
		display: grid;
		grid-template-columns: repeat(2, 1fr);
		grid-gap: 20px;
		margin-bottom: 15px;
		background-color: #F5F5F5;
		padding-top: 10px;
		padding-bottom: 10px;
	}

	.episode_container:before {
		display: none;
	}

	.episode_container:after {
		display: none;
	}

	.beskrivelse {
		padding: 10px;
		text-align: left;
	}

	.podcast_billede {
		max-width: 100%;
		margin: 5px;
	}

	.main_podcast_billede {
		max-width: 100%;
	}

	.episode_navn {
		text-align: left;
	}

	.episode_tekst {
		text-align: left;
	}

	/*TABLET*/
	@media only screen and (max-width: 800px) {}


	/*Desktop*/
	@media only screen and (min-width: 992px) {
		main {
			max-width: 1200px;
			margin: 0 auto;
			padding-left: 30px;
			padding-right: 30px;
		}

		#podcast {
			display: grid;
			grid-template-columns: repeat(2, 1fr);
			grid-gap: 2rem;
			margin-bottom: 15px;
		}

		#podcast:before {
			display: none;
		}

		#podcast:after {
			display: none;
		}

		.main_podcast_billede {
			max-width: 85%;
		}

		.podcast_billede {
			max-width: 50%;
		}
	}

</style>

<script>
	document.addEventListener("DOMContentLoaded", getJson);
	let podcast;
	let episoder;
	//let nyEpisode;
	let aktuelPodcast = <?php echo get_the_ID() ?>;

	//kun den relevante podcast bliver hentet ind
	const dbUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/podcast/" + aktuelPodcast;
	const episodeUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/episode?per_page=100";

	async function getJson() {
		const data = await fetch(dbUrl);
		podcast = await data.json();

		const data2 = await fetch(episodeUrl);
		episoder = await data2.json();


		visPodcast();
		visEpisoder();
	}

	function visPodcast() {
		console.log("visPodcasts");
		document.querySelector(".main_podcast_billede").src = podcast.billede.guid;
		document.querySelector(".main_podcast_billede").alt = podcast.title.rendered;
		document.querySelector(".main_podcast_billede").title = podcast.title.rendered;

		document.querySelector("h1").innerHTML = podcast.title.rendered;
		document.querySelector(".beskrivelse").innerHTML = podcast.podcast_beskrivelse;


	}

	//function visNyesteEpisode(){
	//console.log("visEpisode");
	//if(episode.date <= dato){
	//		document.querySelector(".ny_billede").innerHTML = podcast.podcast_billede.guid;
	//		document.querySelector(".ny_episode").innerHTML = episode.title.rendered;
	//		document.querySelector(".ny_tekst").innerHTML = episode.title.rendered;}}


	function visEpisoder() {
		console.log("visEpisoder");
		let sektion = document.querySelector(".episode_section");
		let template = document.querySelector("template").content;

		episoder.forEach(episode => {
			console.log("loop kører id :" +
				aktuelPodcast);
			if (episode.tilhorer_podcast == aktuelPodcast) {
				console.log("loop kører id :" +
					aktuelPodcast);
				let klon = template.cloneNode(true);

				klon.querySelector(".episode_container").setAttribute("id", `pid_${podcast.id}`);
				klon.querySelector(".podcast_billede").src = episode.podcast_billede.guid;
				klon.querySelector(".podcast_billede").alt = episode.podcast_billede.guid;
				klon.querySelector(".podcast_billede").title = episode.podcast_billede.guid;

				klon.querySelector(".episode_navn").innerHTML = episode.episode_navn;

				klon.querySelector(".episode_tekst").innerHTML = episode.episode_beskrivelse.substring(0, 90) + "...";
				klon.querySelector(".mere_button").innerHTML += `<button>Læs mere</button>`
				klon.querySelector(".mere_button").addEventListener("click", () => visMere(episode));

				sektion.appendChild(klon);

			}
		})
		document.querySelector("button").addEventListener("click", tilbageTilMenu);

	}

	//-------VIS MERE KNAP-------
	function visMere(episode) {
		console.log("click");

		document.querySelector(".mere_button").removeEventListener("click", () => visMere(episode));

		document.querySelector(`#pid_${podcast.id}`).querySelector(".episode_tekst").innerHTML = episode.episode_beskrivelse;

		document.querySelector(`#pid_${podcast.id}`).querySelector(".mere_button").innerHTML = `<button>Læs mindre</button>`


		document.querySelector(`#pid_${podcast.id}`).querySelector(".mere_button").addEventListener("click", () => visMindre(episode));

	}

	//-------VIS MINDRE KNAP--------
	function visMindre(episode) {
		console.log(episode);
		document.querySelector(`#pid_${podcast.id}`).querySelector(".episode_tekst").textContent = episode.episode_beskrivelse.substring(0, 90) + "...";

		document.querySelector(`#pid_${podcast.id}`).querySelector(".mere_button").innerHTML = `<button>Læs mere</button>`

		document.querySelector(`#pid_${podcast.id}`).querySelector(".mere_button").addEventListener("click", () => visMere(episode));
	}


	function tilbageTilMenu() {
		history.back();
	}

	getJson();

</script>
<?php get_footer(); ?>
