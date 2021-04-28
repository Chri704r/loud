<?php mesmerize_get_header(); ?>

<div id='page-content' class="page-content">
	<div class="<?php mesmerize_page_content_wrapper_class(); ?>">
		<?php
            while (have_posts()) : the_post();
                get_template_part('template-parts/content', 'page');
            endwhile;
            ?>
		<div class="lyt_container">
			<h2>Lyt til LOUD</h2>
			<div class="streaming">
				<div class="lyt_col_v">
					<a href=""><img src="https://loud.land/wp-content/themes/radioloud/dist/images/spotify_977b3a3c.svg" class="lyt_ikon" alt="spotify ikon"></a>
					<p>Lyt med Spotify</p>
					<a href=""><img src="https://loud.land/wp-content/themes/radioloud/dist/images/apple-podcast_2f6140b7.svg" class="lyt_ikon" alt="apple podcast ikon"></a>
					<p>Lyt med Apple Podcast</p>

				</div>
				<div class="lyt_col_h"><a href=""><img src="https://loud.land/wp-content/themes/radioloud/dist/images/podimo_8c4b0116.png" class="lyt_ikon" alt="podimo ikon"></a>
					<p>Lyt med Podimo</p>
					<a href=""><img src="https://loud.land/wp-content/themes/radioloud/dist/images/google-podcast_27468af1.svg" class="lyt_ikon" alt="google podcast ikon"></a>
					<p>Lyt med Google Podcast</p>
				</div>
			</div>

			<div class="dab">
				<h3>DAB</h3>
				<p>På din DAB-radio skal du måske lave en søgning efter nye kanaler, hvis du ikke har opdateret din DAB-radio for nyligt. Efter søgning vil du finde LOUD blandt dine kanaler.</p>
			</div>
		</div>
	</div>
</div>

<style>
	p {
		text-align: left !important;
		color: #1E2236;
	}

	.lyt_container:before {
		display: none;
	}

	.lyt_container:after {
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

	}

	.lyt_container h2 {
		color: #fff;
	}

	.lyt_container h3 {
		color: #fff;
		text-align: left;

	}

	.dab {
		padding-top: 2rem;
	}

	.dab p {
		text-align: left;
	}

	.streaming:before,
	:after {
		display: none;
	}

	.streaming {
		display: grid;
		grid-template-columns: 1fr 1fr;
		grid-gap: 15px;
	}

	.lyt_ikon {
		width: 2rem;
	}

	.lyt_col_v:before,
	:after {
		display: none;
	}

	.lyt_col_h:before,
	:after {
		display: none;
	}

	@media only screen and (min-width: 992px) {

		.lyt_container {
			padding-left:
		}

		.lyt_col_v {
			display: grid;
			grid-template-columns: 1fr 1fr;
		}

		.lyt_col_h {
			display: grid;
			grid-template-columns: 1fr 1fr;
		}

		.lyt_ikon {}
	}

</style>

<?php get_footer(); ?>
