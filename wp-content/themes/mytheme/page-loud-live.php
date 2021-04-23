<style>
	.liste {
		display: grid;
		grid-auto-columns: 40% 40% 20%;
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

	<div id="main">
		<button id="live">
			<p>AFSPIL LIVE</p>
		</button>

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


		<div class="liste">
			<div class="tid"></div>
			<div class="billede"></div>
			<div class="beskrivelse"></div>
		</div>


	</div>


</div>

<?php get_footer(); ?>


<!------- SCRIPT BEGYNDER ------->
<script>


</script>
