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
		<button id="mandag"></button>
		<button id="tirsdag"></button>
		<button id="onsdag"></button>
		<button id="torsdag"></button>
		<button id="fredag"></button>
		<button id="lordag"></button>
		<button id="sondag"></button>
	</div>


</div>

<?php get_footer(); ?>
