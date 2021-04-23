<style>
	.liste {
		display: grid;
		grid-template-columns: 12% 12% 76%;
	}

	.tid {
		background-color: coral;
	}

	.billede {
		background-color: aqua;
	}

	.beskrivelse {
		background-color: cornflowerblue;
	}

	div.liste::before {
		content: none;
	}

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


		<div id="main">
			<div class="liste">
				<div class="tid">
					<p>00.00</p>
				</div>
				<div class="billede">
					<img src="img/alis_stemmer.jpg" alt="alis_stemmer">
				</div>
				<div class="beskrivelse">
					<h3>Alis stemmer</h3>
					<p>Corona-restriktioner, nedlukningen af skoler, manglen af samvær med venner og bekendte har fremtvunget identitetskriser, angst, sorg og ængstelighed som aldrig før. Emner er der nok at tage fat om. Og det er endda bare dem, der er opstået i corona-tiden. Dertil kommer alle hverdagsproblemerne; kærestersorger, ensomhed, angst, tankemylder eller bare
						lysten til at snakke ud. Dem vi alle kender til. Ali Aminali er LOUDs stemme i natten, som lytter, taler og invitere natteravnene ind i studiet.</p>
				</div>
			</div>


			<div class="liste">
				<div class="tid"></div>
				<div class="billede"></div>
				<div class="beskrivelse"></div>
			</div>


			<div class="liste">
				<div class="tid"></div>
				<div class="billede"></div>
				<div class="beskrivelse"></div>
			</div>


			<div class="liste">
				<div class="tid"></div>
				<div class="billede"></div>
				<div class="beskrivelse"></div>
			</div>


			<div class="liste">
				<div class="tid"></div>
				<div class="billede"></div>
				<div class="beskrivelse"></div>
			</div>


			<div class="liste">
				<div class="tid"></div>
				<div class="billede"></div>
				<div class="beskrivelse"></div>
			</div>


			<div class="liste">
				<div class="tid"></div>
				<div class="billede"></div>
				<div class="beskrivelse"></div>
			</div>


			<div class="liste">
				<div class="tid"></div>
				<div class="billede"></div>
				<div class="beskrivelse"></div>
			</div>


		</div>
	</main>

</div>



<?php get_footer(); ?>


<!------- SCRIPT BEGYNDER ------->
<script>


</script>
