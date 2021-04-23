<style>
	.liste {
		display: grid;
		grid-template-columns: 40% 40% 20%;
		grid-gap: 5px;
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
					<p>hej</p>
				</div>
				<div class="billede">
					<p>hej</p>
				</div>
				<div class="beskrivelse">
					<p>hej</p>
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
