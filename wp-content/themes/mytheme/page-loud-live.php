<style>
	.liste {
		display: grid;
		grid-template-columns: 12% 12% 76%;
		margin: 0 0 5px 0;
	}

	.tid {
		background-color: #F5F5F5;
	}

	.billede {
		background-color: #F5F5F5;
	}

	.beskrivelse {
		background-color: #F5F5F5;
	}

	/*
	div.liste::before {
		content: none;
	}
*/

	.ugedage {
		text-align: center;
	}

	main {
		margin: 0 10%;
	}

</style>



<?php mesmerize_get_header(); ?>

<div id='page-content' class="page-content">
	<div class="<?php mesmerize_page_content_wrapper_class(); ?>">
		<?php
            while (have_posts()) : the_post();
                get_template_part('template-parts/content', 'front');
            endwhile;
            ?>
	</div>

	<main>

		<div class="ugedage">
			<button id="mandag">
				<p>Mandag</p>
			</button>
			<button id="tirsdag">
				<p>Tirsdag</p>
			</button>
			<button id="onsdag">
				<p>Onsdag</p>
			</button>
			<button id="torsdag">
				<p>Torsdag</p>
			</button>
			<button id="fredag">
				<p>Fredag</p>
			</button>
			<button id="lordag">
				<p>Lørdag</p>
			</button>
			<button id="sondag">
				<p>Søndag</p>
			</button>
		</div>

		<button id="live">
			<p>AFSPIL LIVE</p>
		</button>



		<section class="container"></section>



		<template>
			<article>
				<div class="tid">
					<p></p>
				</div>

				<div class="billede">
					<img src="" alt="">
				</div>

				<div class="beskrivelse">
					<h3></h3>
					<p></p>
				</div>
			</article>
		</template>





</div>



<?php get_footer(); ?>


<!------- SCRIPT BEGYNDER ------->
<script>
	let podcasts = [];
	const liste = document.querySelector(".container");
	const skabelon = document.querySelector("template");
	let filterPodcast = "alle";
	document.addEventListener("DOMContentLoaded", start);

	function start() {
		getJson();
	}

	const url = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/podcast?per_page=100";
	async function getJson() {
		let response = awai fetch(url);
		podcasts = await response.json();
		visPodcasts();
	}

	function visPodcasts() {
		console.log(podcasts);
		podcasts.forEach(podcast => {
			const klon = skabelon.cloneNode(true).content;
			klon.querySelector("img").src = podcast.billede.guid;
			klon.querySelector("h3").textContent = podcast.title.rendered;
			klon.querySelector("p").textContent = podcast.podcast_beskrivelse;
			liste.appendChild(klon);
		})
	}

</script>
