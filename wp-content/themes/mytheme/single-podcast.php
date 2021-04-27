<?php mesmerize_get_header(); ?>
<button class="back">Tilbage</button>
<h1 class="podcast_navn">Podcasten</h1>
<article id="podcast">
	<img src="" alt="" class="podcast_billede">
	<p class="beskrivelse"></p>
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
	<img src="" alt="" class="podcast_billede">
	<div>
		<h3 class="episode_navn"></h3>
		<p class="episode_tekst"><a href="">Læs mere</a></p>
		<!--		<a href="">Læs mere</a>-->
	</div>
</template>

<style>
	.back {
		padding: 0.3rem;
		background-color: #E4254A;
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
		document.querySelector(".podcast_billede").src = podcast.billede.guid;
		document.querySelector(".podcast_billede").alt = podcast.title.rendered;
		document.querySelector(".podcast_billede").title = podcast.title.rendered;

		document.querySelector("h1").innerHTML = podcast.title.rendered;
		document.querySelector(".beskrivelse").innerHTML = podcast.podcast_beskrivelse;


	}

	//function visNyesteEpisode(){
	//console.log("visEpisode");
	//if(episode.date <= dato){
	//		document.querySelector(".ny_billede").innerHTML = podcast.podcast_billede.guid;
	//		document.querySelector(".ny_episode").innerHTML = episode.title.rendered;
	//		document.querySelector(".ny_tekst").innerHTML = episode.title.rendered;}}

	getJson()

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
				klon.querySelector(".podcast_billede").src = episode.podcast_billede.guid;
				klon.querySelector(".podcast_billede").alt = episode.podcast_billede.guid;
				klon.querySelector(".podcast_billede").title = episode.podcast_billede.guid;

				klon.querySelector(".episode_navn").innerHTML = episode.episode_navn;

				klon.querySelector(".episode_tekst").innerHTML = episode.episode_beskrivelse;

				sektion.appendChild(klon);

			}
		})
		document.querySelector("button").addEventListener("click", tilbageTilMenu);

	}

	function tilbageTilMenu() {
		history.back();
	}

	getJson();

</script>
<?php get_footer(); ?>
