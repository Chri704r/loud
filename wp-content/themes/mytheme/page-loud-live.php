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

	<!-- Tab links -->
	<div class="tab">
		<button class="tablinks" onclick="openDag(event, 'Man')">Mandag</button>
		<button class="tablinks" onclick="openDag(event, 'Tir')">Tirsdag</button>
		<button class="tablinks" onclick="openDag(event, 'Ons')">Onsdag</button>
		<button class="tablinks" onclick="openDag(event, 'Tor')">Torsdag</button>
		<button class="tablinks" onclick="openDag(event, 'Fre')">Fredag</button>
		<button class="tablinks" onclick="openDag(event, 'Lor')">Lørdag</button>
		<button class="tablinks" onclick="openDag(event, 'Son')">Søndag</button>
	</div>

	<!-- Tab content -->
	<div id="Man" class="tabcontent">
		<h3>Mandag</h3>
		<p>I dag er det mandag</p>
	</div>

	<div id="Tir" class="tabcontent">
		<h3>Tirsdag</h3>
		<p>I dag er det Tirsdag</p>
	</div>

	<div id="Ons" class="tabcontent">
		<h3>Onsdag</h3>
		<p>I dag er det Onsdag</p>
	</div>

	<div id="Tor" class="tabcontent">
		<h3>Torsdag</h3>
		<p>I dag er det Torsdag</p>
	</div>

	<div id="Fre" class="tabcontent">
		<h3>Fredag</h3>
		<p>I dag er det Fredag</p>
	</div>

	<div id="Lor" class="tabcontent">
		<h3>Lørdag</h3>
		<p>I dag er det Lørdag</p>
	</div>

	<div id="Son" class="tabcontent">
		<h3>Søndag</h3>
		<p>I dag er det Søndag</p>
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
				klon.querySelector("#tekst").textContent = podcast.kortbeskrivelse;
				container.appendChild(klon);
			})
		}

		getJson();







		function openDag(evt, dagNavn) {
			// Declare all variables
			var i, tabcontent, tablinks;

			// Get all elements with class="tabcontent" and hide them
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}

			// Get all elements with class="tablinks" and remove the class "active"
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}

			// Show the current tab, and add an "active" class to the button that opened the tab
			document.getElementById(dagNavn).style.display = "block";
			evt.currentTarget.className += " active";
		}

	</script>
