<?php mesmerize_get_header(); ?>

    <main>
        <h1>Alle podcasts</h1>
        <section class="podcast_container"></section>

    </main>

    <template>
        <div class="template_top">
            <img class="podcast_pic" src="" alt="">
            <h2 class="podcast_name"></h2>
            <p class="podcast_beskrivelse"></p>
            <div class="mere_button"></div>
        </div>
    </template>

    <?php get_footer(); ?>

        <style>
            main {
                max-width: 1200px;
                margin: 0 auto;
                padding-left: 15px;
                padding-right: 15px;
                margin-bottom: 30px;
            }

            h2 {
                font-size: 1.3em;
                margin-bottom: 3px;
                margin-top: 5px;
                line-height: 1em;
            }

            .podcast_pic {
                border-radius: 20px;
                cursor: pointer;
            }

            .podcast_container {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                grid-gap: 15px;
                grid-row-gap: 30px;
            }

            .podcast_container:before {
                display: none;
            }

            .podcast_beskrivelse {
                margin-bottom: 3px;
            }

            .mere_button button {
                border: none;
                background-color: white;
                box-shadow: none;
                text-transform: uppercase;
                color: #6f6f6f;
            }

            .mere_button button:hover {
                color: #e4254a;
                cursor: pointer;
            }

            @media only screen and (max-width: 800px) {
                .podcast_container {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    grid-gap: 15px;
                    grid-row-gap: 30px;
                }
                .podcast_beskrivelse {
                    text-align: left;
                }
                h2 {
                    text-align: left;
                }
                .mere_button button {
                    text-align: left;
                }
                .mere_button {
                    text-align: left;
                }
            }

        </style>

        <script>
            let podcasts;

            const dbUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/podcast?per_page=100";


            async function getJson() {
                const data = await fetch(dbUrl);
                podcasts = await data.json();

                console.log(podcasts);

                visPodcasts();

            }

            //---------INDSÆTTER PODCASTS I KLON-------
            function visPodcasts() {
                console.log("visPodcasts");
                const container = document.querySelector(".podcast_container");
                const template = document.querySelector("template").content;

                podcasts.forEach(podcast => {
                    const klon = template.cloneNode(true);

                    klon.querySelector(".template_top").setAttribute("id", `pid_${podcast.id}`);
                    klon.querySelector(".podcast_pic").src = podcast.billede.guid;
                    klon.querySelector(".podcast_name").textContent = podcast.navn;
                    klon.querySelector(".podcast_beskrivelse").textContent = podcast.podcast_beskrivelse.substring(0, 90) + "...";
                    klon.querySelector(".mere_button").innerHTML += `<button>Læs mere</button>`

                    klon.querySelector(".podcast_pic").addEventListener("click", () => visSingle(podcast));
                    klon.querySelector(".mere_button").addEventListener("click", () => visMere(podcast));


                    container.appendChild(klon);

                })

            }

            //-----GÅ TIL SINGLE PODCAST SIDE----
            function visSingle(hvilken) {
                location.href = hvilken.link;
            }

            //-------VIS MERE KNAP-------
            function visMere(podcast) {
                console.log("click");

                document.querySelector(".mere_button").removeEventListener("click", () => visMere(podcast));

                document.querySelector(`#pid_${podcast.id}`).querySelector(".podcast_beskrivelse").textContent = podcast.podcast_beskrivelse;

                document.querySelector(`#pid_${podcast.id}`).querySelector(".mere_button").innerHTML = `<button>Læs mindre</button>`


                document.querySelector(`#pid_${podcast.id}`).querySelector(".mere_button").addEventListener("click", () => visMindre(podcast));

            }

            //-------VIS MINDRE KNAP--------
            function visMindre(podcast) {
                document.querySelector(`#pid_${podcast.id}`).querySelector(".podcast_beskrivelse").textContent = podcast.podcast_beskrivelse.substring(0, 90) + "...";

                document.querySelector(`#pid_${podcast.id}`).querySelector(".mere_button").innerHTML = `<button>Læs mere</button>`

                document.querySelector(`#pid_${podcast.id}`).querySelector(".mere_button").addEventListener("click", () => visMere(podcast));
            }


            getJson();

        </script>
