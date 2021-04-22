<?php mesmerize_get_header(); ?>

    <div id='page-content' class="page-content">

        <h2>Alle podcasts</h2>
        <section class="alle_podcasts"></section>

        <h2>Kategorier</h2>
        <section class="kategori"></section>

        <h2>Til det du laver</h2>
        <section class="laver"></section>

    </div>

    <template>
        <img class="billede" src="" alt="">
    </template>



    <?php get_footer(); ?>

        <style>
            img {
                width: 100%;
            }

            .alle_podcasts {
                display: grid;
                grid-template-columns: repeat(6, 1fr);
                grid-gap: 20px;
            }

            .alle_podcasts:before {
                display: none;
            }

            .kategori {
                display: grid;
                grid-template-columns: repeat(6, 1fr);
                grid-gap: 20px;
            }

            .kategori:before {
                display: none;
            }

            .page-content button {
                width: 150px;
                height: 150px;
                border: none;
                border-radius: 10px;
                background-color: #c9c9c9;
            }

        </style>

        <!------- SCRIPT BEGYNDER ------->

        <script>
            let podcasts;
            let categories;

            const dbUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/podcast?per_page=11";
            const catUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/categories?per_page=100";

            async function getJson() {
                const data = await fetch(dbUrl);
                const catdata = await fetch(catUrl);
                podcasts = await data.json();
                categories = await catdata.json();
                console.log(categories);
                console.log(podcasts);

                visPodcasts();
                opretKnapper();

            }

            function opretKnapper() {

                categories.forEach(cat => {
                    document.querySelector(".kategori").innerHTML += `<button class="filter" data-queen="${cat.id}">${cat.name}</button>`
                })

                addEventListernesToButtons();

            }


            //---------INDSÆTTER PODCASTS I KLON-------
            function visPodcasts() {
                const container = document.querySelector(".alle_podcasts");
                const template = document.querySelector("template").content;

                podcasts.forEach(podcast => {

                    const klon = template.cloneNode(true);
                    klon.querySelector(".billede").src = podcast.billede.guid;

                    container.appendChild(klon);
                })

            }


            getJson();

        </script>
