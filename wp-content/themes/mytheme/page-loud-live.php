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

		main {
			margin: 0 4%;
		}

		.beskrivelse {
			text-align: left;
		}
	}
	}



	/* LÅNT KODE */
	.tab {
		overflow: hidden;
		border: 1px solid #ccc;
		background-color: #f1f1f1;
	}

	/* Style the buttons inside the tab */
	.tab button {
		background-color: inherit;
		float: left;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 14px 16px;
		transition: 0.3s;
		font-size: 17px;
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

	<div class="ugedage">

		<div id="London" class="tabcontent">
			<h3>London</h3>
			<p>London is the capital city of England.</p>
		</div>

		<div id="Paris" class="tabcontent">
			<h3>Paris</h3>
			<p>Paris is the capital of France.</p>
		</div>

		<div id="Tokyo" class="tabcontent">
			<h3>Tokyo</h3>
			<p>Tokyo is the capital of Japan.</p>
		</div>




		<!--
		<button class="tablinks" onclick="openDag(event, 'London')">
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
-->
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

		function openCity(evt, cityName) {
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			document.getElementById(cityName).style.display = "block";
			evt.currentTarget.className += " active";
		}

	</script>
