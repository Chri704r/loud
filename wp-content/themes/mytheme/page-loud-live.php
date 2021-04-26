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

		@media only screen and (max-width: 800px) {
			main {
				margin: 0 4%;
			}

			.beskrivelse {
				text-align: left;
			}
		}
	}

	@media only screen and (max-width: 700px) {

		main {
			margin: 0 4%;
		}

		.beskrivelse {
			text-align: left;
		}
	}
	}



	/* STYLING TIL TABS */
	/* Style the tab */
	.tab {
		overflow: hidden;
		border: 1px solid #ccc;
		background-color: #f1f1f1;
	}

	/* Style the buttons that are used to open the tab content */
	.tab button {
		background-color: inherit;
		float: left;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 14px 16px;
		transition: 0.3s;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
		background-color: #ddd;
	}

	/* Create an active/current tablink class */
	.tab button.active {
		background-color: #ccc;
	}

	/* Style the tab content */
	.tabcontent {
		display: none;
		padding: 6px 12px;
		border: 1px solid #ccc;
		border-top: none;
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
			</div>
		</article>
	</template>






	</div>



	<?php get_footer(); ?>


	<!------- SCRIPT BEGYNDER ------->
	<!------- 7 første podcasts har fået tid og dato ------->
	<script>
		let podcasts;
		let ugedage;

		const dbUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/podcast?per_page=100";
		const dagUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/ugedag";


		async function getJson() {
			const data = await fetch(dbUrl);
			const dagdata = await fetch(dagUrl);
			podcasts = await data.json();
			ugedage = await dagdata.json();
			console.log(ugedage);
			visPodcasts();
			opretKnapper();
		}

		function opretKnapper() {
			ugedage.forEach(dag => {
				document.querySelector("#filtrering").innerHTML += `<button class="filter" data-dag="${dag.id}">${dag.name}</button>`
			})
		}

		function visPodcasts() {
			let temp = document.querySelector("template");
			let container = document.querySelector(".container")
			podcasts.forEach(podcast => {
				let klon = temp.cloneNode(true).content;
				klon.querySelector("img").src = podcast.billede.guid;
				klon.querySelector("h3").innerHTML = podcast.title.rendered;
				klon.querySelector("#tekst").textContent = podcast.kortbeskrivelse;
				container.appendChild(klon);
			})
		}

		getJson();

	</script>
