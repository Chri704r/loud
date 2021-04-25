<?php mesmerize_get_header(); ?>

    <h1 class="categori">Kategori</h1>

    <section>
        <p>HEJJJJJJ</p>
    </section>


    <template>
        <img src="" alt="" class="podcast_pic">
        <h2 class="podcast_name"></h2>
        <p class="podcast_beskrivelse"></p>
    </template>

    <script>
        let podcasts;
        let categories;
        let aktuel_cat = <?php echo get_the_ID() ?>;

        const dbUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/categories/" + aktuel_cat;

        async function getJson() {
            const data = await fetch(dbUrl);
            podcasts = await data.json();
            console.log(podcasts);
            visPodcasts();

        }


        //---------INDSÆTTER RETTER I KLON-------
        function visPodcasts() {
            const container = document.querySelector(".podcast_container");
            const template = document.querySelector("template").content;

            podcasts.forEach(podcast => {
                if (podcast.categories.) {
                    const klon = template.cloneNode(true);

                    klon.querySelector(".podcast_pic").src = podcast.billede.guid;
                    klon.querySelector(".podcast_name").src = podcast.titel.rendered;
                    klon.querySelector(".podcast_beskrivelse").src = podcast.podcast_beskrivelse;



                    container.appendChild(klon);
                }
            })


        }


        getJson();

    </script>


    <?php get_footer(); ?>
