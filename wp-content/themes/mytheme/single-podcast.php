<?php mesmerize_get_header(); ?>
<h1 class="podcast_navn">Podcasten</h1>
<article id="podcast">
	<img src="" alt="" class="podcast_billede">
	<p class="beskrivelse"></p>
</article>

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

<h2>Alle Episoder</h2>
<section class="episoder">
	<template>
		<img src="" alt="" class="podcast_billede">
		<div>
			<h3 class="episode_navn"></h3>
			<p class="episode_tekst"></p>
			<a href="">Læs mere</a>
		</div>
	</template>
</section>

<script>
	document.addEventListener("DOMContentLoaded", getJson);
	let podcast;
	let episoder;
	let aktuelPodcast = <?php echo get_the_ID() ?>;

	const dbUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/podcast/" + aktuelPodcast;
	const episodeUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/episode/";

	async function getJson() {
		const data = await fetch(dbUrl);
		podcast = await data.json();

		const data2 = await fetch(dbUrl);
		episoder = await data2.json();


		visPodcast();
		visEpisoder();
	}

	function visPodcast() {
		console.log("visPodcasts");
		document.querySelector(".podcast_billede").src = podcast.picture.guid;
		document.querySelector(".podcast_billede").alt = podcast.title.rendered;
		document.querySelector(".podcast_billede").title = podcast.title.rendered;

		document.querySelector("h1").innerHTML = podcast.title.rendered;

		document.querySelector(".ny_episode").innerHTML = episode.title.rendered;
		document.querySelector(".episode_navn").innerHTML = episode.title.rendered;


		document.querySelector(".beskrivelse").innerHTML = podcast.beskrivelse;

		document.querySelector(".episode_tekst").innerHTML = podcast.;


		document.querySelector("button").addEventListener("click", tilbageTilMenu);
	}

	function tilbageTilMenu() {
		history.back();
	}

</script>
<?php get_footer(); ?>
