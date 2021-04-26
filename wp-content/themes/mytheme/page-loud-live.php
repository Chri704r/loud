<style>
	article {
		display: grid;
		grid-template-columns: 12% 23% 65%;
		margin: 0 0 15px 0;
	}

	article div {
		padding: 5%;
	}

	article div img {
		width: 100%;
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

	article::before {
		display: none !important;
		content: none !important;
	}

	.ugedage {
		text-align: center;
	}

	main {
		margin: 0 10%;
	}

	@media only screen and (max-width: 700px) {

		body {
			background-color: aqua;
		}
	}

</style>



<?php mesmerize_get_header(); ?>

<!--
<div id='page-content' class="page-content">
	<div class="<?php mesmerize_page_content_wrapper_class(); ?>">
		<?php
            while (have_posts()) : the_post();
                get_template_part('template-parts/content', 'front');
            endwhile;
            ?>
	</div>
-->

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
				<p id="tekst"></p>
			</div>
		</article>
	</template>





	</div>



	<?php get_footer(); ?>


	<!------- SCRIPT BEGYNDER ------->
	<!------- 7 første podcasts har fået tid og dato ------->
	<script>
		let podcasts;

		const dbUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/podcast?per_page=100";


		async function getJson() {
			const data = await fetch(dbUrl);
			podcasts = await data.json();
			console.log(podcasts);
			visPodcasts();
		}

		function visPodcasts() {
			let temp = document.querySelector("template");
			let container = document.querySelector(".container")
			podcasts.forEach(podcast => {
				let klon = temp.cloneNode(true).content;
				klon.querySelector("img").src = podcast.billede.guid;
				klon.querySelector("h3").innerHTML = podcast.title.rendered;
				klon.querySelector("#tekst").textContent = podcast.podcast_beskrivelse;
				container.appendChild(klon);
			})
		}

		getJson();

	</script>
