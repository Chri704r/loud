<?php mesmerize_get_header(); ?>

    <main class="main">
        <h2>Populære podcasts</h2>
        <div id="podcast_wrapper">
            <section class="podcast_container">
                <img class="pil slide" src="<?php echo get_stylesheet_directory_uri()?>/img/pil2.png" alt="pil">
                <img class="pil_back" src="<?php echo get_stylesheet_directory_uri()?>/img/pil_back.png" alt="pil">
            </section>
        </div>

        <h2>Nyeste episoder</h2>
        <div id="podcast_wrapper">
            <section class="nyeste">
                <img class="pil2 slide" src="<?php echo get_stylesheet_directory_uri()?>/img/pil2.png" alt="pil">
                <img class="pil_back2" src="<?php echo get_stylesheet_directory_uri()?>/img/pil_back.png" alt="pil">

            </section>
        </div>

        <h2>Aktuelt lige nu</h2>
        <div id="podcast_wrapper">
            <section class="aktuelt">
                <img class="pil3 slide" src="<?php echo get_stylesheet_directory_uri()?>/img/pil2.png" alt="pil">
                <img class="pil_back3" src="<?php echo get_stylesheet_directory_uri()?>/img/pil_back.png" alt="pil">

            </section>
        </div>

    </main>
    <template>
        <div class="alle_container">
            <img class="billede" src="" alt="">
        </div>
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
            .navigation-bar {
                background-color: RGB(0, 0, 0, 0);
            }

            .billede {
                width: 100%;
                cursor: pointer;
            }

            .pil {
                position: absolute;
                right: 10px;
                top: 45%;
                cursor: pointer;
            }

            .pil_back {
                position: absolute;
                left: 5px;
                top: 45%;
                cursor: pointer;
            }

            .pil2 {
                position: absolute;
                right: 10px;
                top: 150px;
                cursor: pointer;
            }

            .pil_back2 {
                position: absolute;
                left: 5px;
                top: 30%;
                cursor: pointer;
            }

            .pil3 {
                position: absolute;
                right: 10px;
                top: 45%;
                cursor: pointer;
            }

            .pil_back3 {
                position: absolute;
                left: 5px;
                top: 45%;
                cursor: pointer;
            }

            #podcast_wrapper {
                position: relative;
            }

            .main {
                max-width: 1300px;
                margin: 0 auto;
                padding-right: 20px;
                padding-left: 20px;
                padding-bottom: 60px;
            }

            h2 {
                margin: 20px 0 0 0px;
                font-size: 1.6em;
            }

            h3 {
                font-size: 1.3em;
                margin-bottom: 1px;
            }

            .podcast_container {
                display: grid;
                grid-template-columns: repeat(10, 1fr);
                grid-gap: 30px;
                margin-top: 10px;
                overflow-x: scroll;
                scroll-behavior: smooth;
                margin-left: -30px;
            }

            .alle_container {
                width: 350px;
            }

            .episode_container {
                width: 350px;
            }

            .nyeste {
                display: grid;
                grid-template-columns: repeat(10, 1fr);
                grid-gap: 30px;
                margin-top: 10px;
                overflow-x: scroll;
                scroll-behavior: smooth;
            }

            .nyeste:before {
                display: none;
            }

            .aktuelt {
                display: grid;
                grid-template-columns: repeat(10, 1fr);
                grid-gap: 30px;
                margin-top: 10px;
                overflow-x: scroll;
                scroll-behavior: smooth;
                margin-left: -30px;
            }

            .episode_billede {
                width: 100%;
                cursor: pointer;
            }

            .color-overlay:after,
            .color-overlay:before {
                width: 0;
            }

            .mere_button {
                background-color: #fff !important;
                border: none;
                box-shadow: none;
                text-transform: uppercase;
                color: #6f6f6f;
            }

            button {
                background-color: #fff !important;
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

            @media only screen and (max-width: 770px) {
                h2 {
                    text-align: left;
                }
                h3 {
                    text-align: left;
                }
                p {
                    text-align: left;
                }
                #podcast_wrapper {
                    overflow: hidden;
                    width: 95vw;
                }
                .podcast_container {
                    grid-gap: 10px;
                    margin-left: 0px;
                }
                .podcast_container:before {
                    display: none;
                }
                .nyeste {
                    grid-gap: 10px;
                }
                .aktuelt {
                    grid-gap: 10px;
                    margin-left: 0px;
                }
                .aktuelt:before {
                    display: none;
                }
                .alle_container {
                    width: 190px;
                }
                .episode_container {
                    width: 190px;
                }
                .mere_button {
                    text-align: left;
                }
                .pil {
                    display: none;
                }
                .pil2 {
                    display: none;
                }
                .pil3 {
                    display: none;
                }
                .pil_back {
                    display: none;
                }
                .pil_back2 {
                    display: none;
                }
                .pil_back3 {
                    display: none;
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


            //---------INDSÆTTER PODCASTS I KLON-------
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

            //-----INDSÆTTER EPISODER I KLON----
            function visPodcasts2() {
                const container = document.querySelector(".nyeste");
                const template = document.querySelector(".template2").content;

                episoder.forEach(episode => {
                    const klon = template.cloneNode(true);

                    klon.querySelector(".episode_container").setAttribute("id", `pid_${episode.id}`);

                    klon.querySelector(".episode_billede").src = episode.podcast_billede.guid;
                    klon.querySelector(".episode_navn").textContent = episode.title.rendered;
                    klon.querySelector(".episode_beskrivelse").textContent = episode.episode_beskrivelse.substring(0, 80) + "...";
                    klon.querySelector(".mere_button").innerHTML += `<button>Læs mere</button>`

                    klon.querySelector(".episode_billede").addEventListener("click", () => visPodcastDetaljer(episode));
                    klon.querySelector(".mere_button").addEventListener("click", () => visMere(episode));

                    container.appendChild(klon);
                })

            }

            //--------INDSÆTTER PODCASTS I KLON-----------
            function visPodcasts3() {
                const container = document.querySelector(".aktuelt");
                const template = document.querySelector("template").content;

                podcasts.forEach(podcast => {
                    if (podcast.categories.includes(21)) {
                        const klon = template.cloneNode(true);
                        klon.querySelector(".billede").src = podcast.billede.guid;

                        klon.querySelector(".billede").addEventListener("click", () => visDetaljer(podcast));

                        container.appendChild(klon);
                    }
                })

            }

            function visPodcastDetaljer(hvem) {
                //finder podcast som episoden tilhører
                let parent_podcast = podcasts.filter(podcast => podcast.id == hvem.tilhorer_podcast);
                //finder podcastens link
                let podcast_link = parent_podcast[0].link;
                //går til link ved klik
                location.href = podcast_link;
            }

            function visDetaljer(hvem) {
                console.log(hvem.id);
                location.href = hvem.link;

            }


            //-------VIS MERE KNAP-------
            function visMere(episode) {
                console.log("click");

                document.querySelector(".mere_button").removeEventListener("click", () => visMere(episode));

                document.querySelector(`#pid_${episode.id}`).querySelector(".episode_beskrivelse").textContent = episode.episode_beskrivelse;

                document.querySelector(`#pid_${episode.id}`).querySelector(".mere_button").innerHTML = `<button>Læs mindre</button>`


                document.querySelector(`#pid_${episode.id}`).querySelector(".mere_button").addEventListener("click", () => visMindre(episode));

            }

            //-------VIS MINDRE KNAP--------
            function visMindre(episode) {
                document.querySelector(`#pid_${episode.id}`).querySelector(".episode_beskrivelse").textContent = episode.episode_beskrivelse.substring(0, 90) + "...";

                document.querySelector(`#pid_${episode.id}`).querySelector(".mere_button").innerHTML = `<button>Læs mere</button>`

                document.querySelector(`#pid_${episode.id}`).querySelector(".mere_button").addEventListener("click", () => visMere(episode));
            }

            //---------SCROLL VED KLIK-----------

            //---første pil
            document.querySelector(".pil").onclick = function() {
                document.querySelector(".podcast_container").scrollLeft += 1100;
            };

            document.querySelector(".pil_back").onclick = function() {
                document.querySelector(".podcast_container").scrollLeft -= 1100;
            };
            //---anden pil
            document.querySelector(".pil2").onclick = function() {
                console.log("click nyeste");
                document.querySelector(".nyeste").scrollLeft += 1100;
            };
            document.querySelector(".pil_back2").onclick = function() {
                console.log("click nyeste");
                document.querySelector(".nyeste").scrollLeft -= 1100;
            };

            //---tredje pil
            document.querySelector(".pil3").onclick = function() {
                console.log("click nyeste");
                document.querySelector(".aktuelt").scrollLeft += 1100;
            };
            document.querySelector(".pil_back3").onclick = function() {
                document.querySelector(".aktuelt").scrollLeft -= 1100;
            };


            getJson();

        </script>
