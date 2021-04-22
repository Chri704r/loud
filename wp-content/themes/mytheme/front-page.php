<?php mesmerize_get_header(); ?>

    <main>
        <h2>Populære podcasts</h2>
        <section class="podcast_container"></section>
        <h2>Nyeste episoder</h2>
        <section class="nyeste"></section>
        <h2>Aktuelt lige nu</h2>
        <section class="aktuelt"></section>

    </main>
    <template>
        <img class="billede" src="" alt="">
    </template>




    <?php get_footer(); ?>

        <style>
            h2 {
                margin: 20px 0 0 30px;
                font-size: 1.6em;
            }

            .podcast_container {
                display: flex;
                grid-gap: 30px;
                margin-top: 10px;
                overflow-x: scroll;
                width: 100%;
                height: 350px;
            }

            .nyeste {
                display: flex;
                grid-gap: 30px;
                margin-top: 10px;
                overflow-x: scroll;
                width: 100%;
                height: 350px;
            }

            .aktuelt {
                display: flex;
                grid-gap: 30px;
                margin-top: 10px;
                overflow-x: scroll;
                width: 100%;
                height: 350px;
            }

            img {
                width: 100%;
                height: 100%;
            }

        </style>


        <!------- SCRIPT BEGYNDER ------->

        <script>
            let podcasts;
            let categories;

            const dbUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/podcast?per_page=100";
            const catUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/categories";

            async function getJson() {
                const data = await fetch(dbUrl);
                const catdata = await fetch(catUrl);
                podcasts = await data.json();
                categories = await catdata.json();
                console.log(categories);
                console.log(podcasts);

                visPodcasts();
                visPodcasts2();
                visPodcasts3();
            }


            //---------INDSÆTTER RETTER I KLON-------
            function visPodcasts() {
                const container = document.querySelector(".podcast_container");
                const template = document.querySelector("template").content;

                podcasts.forEach(podcast => {
                    if (podcast.categories.includes(5)) {
                        const klon = template.cloneNode(true);

                        klon.querySelector(".billede").src = podcast.billede.guid;

                        container.appendChild(klon);
                    }
                })


            }

            function visPodcasts2() {
                const container = document.querySelector(".nyeste");
                const template = document.querySelector("template").content;

                podcasts.forEach(podcast => {
                    if (podcast.categories.includes(6)) {
                        const klon = template.cloneNode(true);

                        klon.querySelector(".billede").src = podcast.billede.guid;

                        container.appendChild(klon);
                    }
                })


            }

            function visPodcasts3() {
                const container = document.querySelector(".aktuelt");
                const template = document.querySelector("template").content;

                podcasts.forEach(podcast => {
                    if (podcast.categories.includes(21)) {
                        const klon = template.cloneNode(true);

                        klon.querySelector(".billede").src = podcast.billede.guid;

                        container.appendChild(klon);
                    }
                })


            }

            getJson();

        </script>
