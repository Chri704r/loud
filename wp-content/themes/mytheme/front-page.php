<?php mesmerize_get_header(); ?>

    <main class="main">
        <h2>Populære podcasts</h2>
        <section class="podcast_container">
            <img class="pil slide" src="<?php echo get_stylesheet_directory_uri()?>/img/pil.png" alt="pil">
        </section>

        <h2>Nyeste episoder</h2>
        <section class="nyeste">
            <img class="pil2 slide" src="<?php echo get_stylesheet_directory_uri()?>/img/pil.png" alt="pil">
        </section>

        <h2>Aktuelt lige nu</h2>
        <section class="aktuelt">
            <img class="pil3 slide" src="<?php echo get_stylesheet_directory_uri()?>/img/pil.png" alt="pil">
        </section>

    </main>
    <template>
        <img class="billede" src="" alt="">
    </template>

    <template class="template2">
        <div class="episode_container">
            <img class="episode_billede">
            <div class="overlay"></div>
            <h3 class="episode_navn"></h3>
            <p class="episode_beskrivelse"></p>
            <div class="mere_button"></div>
        </div>
    </template>



    <?php get_footer(); ?>

        <style>
            .billede {
                width: 100%;
                height: 100%;
            }

            .pil {
                position: absolute;
                right: 60px;
                top: 115vh;
            }

            .pil2 {
                position: absolute;
                right: 60px;
                top: 177vh;
            }

            .pil3 {
                position: absolute;
                right: 60px;
                top: 256vh;
            }

            .main {
                max-width: 1300px;
                margin: 0 auto;
                padding-right: 15px;
                padding-left: 15px;
                padding-bottom: 60px;
            }

            h2 {
                margin: 20px 0 0 30px;
                font-size: 1.6em;
            }

            h3 {
                font-size: 1.3em;
            }

            .podcast_container {
                display: flex;
                grid-gap: 30px;
                margin-top: 10px;
                overflow-x: scroll;
                width: 100%;
                height: 350px;
            }

            .episode_container {
                width: 350px;
            }

            .nyeste {
                display: grid;
                grid-template-columns: repeat(10, 1fr);
                grid-gap: 30px;
                margin-top: 10px;
                margin-left: 25px;
                overflow-x: scroll;
            }

            .nyeste:before {
                display: none;
            }

            .aktuelt {
                display: flex;
                grid-gap: 30px;
                margin-top: 10px;
                overflow-x: scroll;
                width: 100%;
                height: 350px;
            }

            .episode_billede {
                width: 100%;
            }

            .color-overlay:after,
            .color-overlay:before {
                width: 0;
            }

            .mere_button {
                background-color: white !important;
            }

            .slide {
                animation-name: slide_kf;
                animation-duration: 1s;
                animation-iteration-count: infinite;
                animation-direction: alternate;
            }

            @keyframes slide_kf {
                0% {
                    transform: translateX(0px);
                }
                100% {
                    transform: translateX(-10px);
                }
            }

        </style>


        <!------- SCRIPT BEGYNDER ------->

        <script>
            let podcasts;
            let categories;
            let episoder;

            const dbUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/podcast?per_page=100";
            const catUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/categories";
            const epiUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/episode?categories=6";

            async function getJson() {
                const data = await fetch(dbUrl);
                const catdata = await fetch(catUrl);
                const epidata = await fetch(epiUrl);

                podcasts = await data.json();
                categories = await catdata.json();
                episoder = await epidata.json();

                console.log("categories: ", categories);
                console.log("podcasts: ", podcasts);
                console.log("epiosder: ", episoder);

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
                        klon.querySelector(".billede").addEventListener("click", () => visDetaljer(podcast));

                        container.appendChild(klon);

                    }
                })


            }

            function visPodcasts2() {
                const container = document.querySelector(".nyeste");
                const template = document.querySelector(".template2").content;

                episoder.forEach(episode => {
                    const klon = template.cloneNode(true);
                    klon.querySelector(".episode_billede").src = episode.podcast_billede.guid;
                    klon.querySelector(".episode_navn").textContent = episode.title.rendered;
                    klon.querySelector(".episode_beskrivelse").textContent = episode.episode_beskrivelse.substring(0, 80) + "...";

                    klon.querySelector(".mere_button").innerHTML += `<button>Læs mere</button>`

                    klon.querySelector(".episode_billede").addEventListener("click", () => visDetaljer(episode));

                    container.appendChild(klon);
                })


            }

            function visPodcasts3() {
                const container = document.querySelector(".aktuelt");
                const template = document.querySelector("template").content;

                podcasts.forEach(podcast => {
                    if (podcast.categories.includes(21)) {
                        const klon = template.cloneNode(true);

                        klon.querySelector(".billede").src = podcast.billede.guid;

                        //klon.querySelector(".billede").addEventListener("click", () => visDetaljer(podcast));

                        container.appendChild(klon);
                    }
                })

            }

            function visDetaljer(hvem) {
                location.href = hvem.link;

            }

            getJson();

        </script>
