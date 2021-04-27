<style>
	@import url('https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap');
	@import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');



	h1 {
		color: #E4254A;

	}

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

	#live {
		background-color: #E4254A;
		color: #fff;
		border-radius: 12px;
		border: none;
		padding: 15px 38px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-family: 'Lato', sans-serif;
		font-weight: 700;
		font-size: 1.3rem;
		margin: 0 0 13px 0;
	}

	#live:active {
		background-color: #bb1636;
	}

	#live:hover {
		background-color: #bb1636;
	}

	.filter {
		background-color: #F1F1F1;
		color: #000;
		border-radius: 8px;
		border: none;
		padding: 10px 22px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-family: 'Lato', sans-serif;
		margin: 27px 1% 20px 0;
		font-weight: 700;
		font-size: 1rem;
	}

	.filter:active {
		background-color: #BCBCBC;
	}

	.filter:hover {
		background-color: #BCBCBC;
	}

	.mere_button {
		padding: 0;
	}

	.mere_button button {
		background-color: #F5F5F5;
	}

	.mere_button button:hover {
		background-color: #F5F5F5;
	}

	.tid {
		color: #E4254A;
		font-family: 'Lato', sans-serif;
		font-weight: 700;
		font-size: 1.3rem;
		padding-top: 90%;
	}



	@media only screen and (max-width: 800px) {

		body {
			text-align: left !important;
		}

		main {
			margin: 0 4%;
		}

		.beskrivelse {
			text-align: left;
		}


	}


	@media only screen and (max-width: 700px) {

		body {
			text-align: left !important;
		}

		main {
			margin: 0 4%;
		}

		.beskrivelse {
			text-align: left;
		}

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

	<h1>LOUD Live</h1>

	<nav id="filtrering"></nav>




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
				<div class="mere_button"></div>
			</div>


		</article>
	</template>






	</div>



	<?php get_footer(); ?>


	<!------- SCRIPT BEGYNDER ------->
	<script>
		let podcasts;
		let categories;
		let filterDag;

		const dbUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/podcast?per_page=100";
		const catUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/ugedag";


		async function getJson() {
			console.log("getJson");
			const data = await fetch(dbUrl);
			const catdata = await fetch(catUrl);
			podcasts = await data.json();
			categories = await catdata.json();
			console.log(categories);
			visPodcasts();
			opretKnapper();
		}


		function opretKnapper() {
			console.log("opretKnapper");
			categories.forEach(cat => {
				document.querySelector("#filtrering").innerHTML += `<button class="filter" data-dag="${cat.id}">${cat.name}</button>`
			})

			addEventListenersToButtons();
		}

		function addEventListenersToButtons() {
			console.log("addEventListenersToButtons")
			document.querySelectorAll("#filtrering button").forEach(elm =>
				elm.addEventListener("click", filtrering));
		}


		function filtrering() {
			console.log("filtrering")
			filterDag = this.dataset.dag;
			console.log("filterDag", filterDag);

			visPodcasts();
		}


		function visPodcasts() {


			console.log("podcast");



			let temp = document.querySelector("template");
			let container = document.querySelector(".container")
			container.innerHTML = "";
			console.log("podcasts: ", podcasts);
			podcasts.forEach(podcast => {
				if (podcast.sendeplan == filterDag) {
					let klon = temp.cloneNode(true).content;
					klon.querySelector(".tid").innerHTML = podcast.tidspunkt;
					klon.querySelector("article").setAttribute("id", `pid_${podcast.id}`);
					klon.querySelector("img").src = podcast.billede.guid;
					klon.querySelector("h3").innerHTML = podcast.title.rendered;

					klon.querySelector("#tekst").textContent = podcast.podcast_beskrivelse.substring(0, 180) + "...";
					klon.querySelector(".mere_button").innerHTML += `<button>Læs mere</button>`
					klon.querySelector(".mere_button").addEventListener("click", () => visMere(podcast));

					container.appendChild(klon);

				}
			})

		}







		//-------VIS MERE KNAP-------
		function visMere(podcast) {
			console.log("visMere");

			document.querySelector(".mere_button").removeEventListener("click", () => visMere(podcast));

			document.querySelector(`#pid_${podcast.id}`).querySelector("#tekst").textContent = podcast.podcast_beskrivelse;

			document.querySelector(`#pid_${podcast.id}`).querySelector(".mere_button").innerHTML = `<button>Læs mindre</button>`


			document.querySelector(`#pid_${podcast.id}`).querySelector(".mere_button").addEventListener("click", () => visMindre(podcast));

		}


		//-------VIS MINDRE KNAP--------
		function visMindre(podcast) {
			document.querySelector(`#pid_${podcast.id}`).querySelector("#tekst").textContent = podcast.podcast_beskrivelse.substring(0, 180) + "...";

			document.querySelector(`#pid_${podcast.id}`).querySelector(".mere_button").innerHTML = `<button>Læs mere</button>`

			document.querySelector(`#pid_${podcast.id}`).querySelector(".mere_button").addEventListener("click", () => visMere(podcast));
		}

		getJson();

	</script>
