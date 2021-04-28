<?php mesmerize_get_header(); ?>

<div id='page-content' class="page-content">
	<div class="<?php mesmerize_page_content_wrapper_class(); ?>">
		<?php
            while (have_posts()) : the_post();
                get_template_part('template-parts/content', 'page');
            endwhile;
            ?>
		<div class="lyt_container">
			<h2 class="lyt_med">Lyt til LOUD</h2>
			<div class="streaming">
				<div class="lyt_col_v">
					<a href=""><img src="https://loud.land/wp-content/themes/radioloud/dist/images/spotify_977b3a3c.svg" class="lyt_ikon" alt="spotify ikon"></a>
					<p>Lyt med Spotify</p>

					<a href=""><img src="https://loud.land/wp-content/themes/radioloud/dist/images/apple-podcast_2f6140b7.svg" class="lyt_ikon" alt="apple podcast ikon"></a>
					<p>Lyt med Apple Podcast</p>
				</div>
				<div class="lyt_col_h"><a href=""><img src="https://loud.land/wp-content/themes/radioloud/dist/images/podimo_8c4b0116.png" class="lyt_ikon" alt="podimo ikon"></a>
					<p class="lyt_tekst">Lyt med Podimo</p>
					<a href=""><img src="https://loud.land/wp-content/themes/radioloud/dist/images/google-podcast_27468af1.svg" class="lyt_ikon" alt="google podcast ikon"></a>
					<p class="lyt_tekst">Lyt med Google Podcast</p>
				</div>
			</div>

			<div class=" dab">
				<h3>DAB</h3>
				<p>På din DAB-radio skal du måske lave en søgning efter nye kanaler, <br>hvis du ikke har opdateret din DAB-radio for nyligt. Efter søgning vil du finde LOUD blandt dine kanaler.</p>
			</div>
		</div>
	</div>
</div>

<style>
	.wp-block-columns p {
		text-align: left !important;
		color: #1E2236;
	}

	.lyt_med {
		color: #1E2236;
		margin-left: 4vw;
	}

	.lyt_container:before !important {
		display: none;
	}

	.lyt_container:after !important {
		display: none;
	}

	.lyt_container {
		display: grid;
		grid-template-rows: 1fr 1fr;
		background: #E4254A;
		margin: -3rem;
		padding: 4rem;
	}

	.lyt_container p {
		color: #fff;
		text-align: center !important;

	}

	.lyt_container h2 {
		color: #fff;
		margin-bottom: 2rem;
		text-align: left;
	}

	.lyt_container h3 {
		color: #fff;
		text-align: left;

	}

	.dab {
		padding-top: 2rem;

	}

	.dab p {
		text-align: left !important;
	}

	.streaming:before,
	:after {
		display: none;
	}

	.lyt_ikon {
		width: 3rem;
	}

	.lyt_col_v:before,
	:after {
		display: none;
	}

	.lyt_col_v {
		display: grid;
		grid-template-columns: 1fr 1fr;
		grid-gap: 2vw;
	}

	.lyt_col_h {
		display: grid;
		grid-template-columns: 1fr 1fr;
		grid-gap: 2vw;
	}

	.lyt_col_h:before,
	:after {
		display: none;
	}

	#page-content.page-content::after {
		display: none;
	}

	@media only screen and (min-width: 992px) {

		h1 {
			margin-left: 4vw;
		}

		.lyt_ikon {
			width: 3rem;
		}

		.lyt_container p {
			color: #fff;
			text-align: left !important;
		}

		.lyt_container h2 {
			margin-bottom: 8vw !important;
			margin-top: -5vw;

		}



		.lyt_col_v .lyt_ikon {
			margin-left: 18vw;
		}



		.lyt_col_h .lyt_tekst {
			margin-left: -18vw;
		}

		figure {
			max-width: 30vw;
		}


		.streaming {
			display: grid;
			grid-template-columns: 1fr 1fr;
			grid-gap: 15px;
		}


		.wp-block-columns {
			margin-left: 4vw;
			margin-right: 4vw;
		}

		.wp-image-128 {
			max-width: 15vw !important;
		}

		.wp-image-133 {
			margin-left: 4vw;

		}

		.dab {
			margin-left: 4vw;
		}

		.dab p {
			text-align: left;
		}

	}

</style>

<?php get_footer(); ?>
