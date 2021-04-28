<?php mesmerize_get_header(); ?>

    <div id='page-content' class="page-content">
        <div class="main">
            <h1>Podcasts</h1>
            <h2>Alle podcasts</h2>

            <section class="alle_podcasts">
                <div class="alle_knap">Se alle</div>
            </section>

            <h2>Kategorier</h2>
            <section class="kategori"></section>

            <h2>Til det du laver</h2>
            <section class="laver"></section>
        </div>
    </div>

    <template>
        <img class="billede" src="" alt="">
    </template>



    <?php get_footer(); ?>

        <style>
            img {
                width: 100%;
            }

            h1 {
                color: #e4254a;
                margin-top: 30px;
            }

            h2 {
                margin-top: 40px;
                font-size: 1.8em;
                line-height: 0.1em;
                margin-bottom: 25px;
            }

            .billede {
                border-radius: 20px;
                cursor: pointer;
            }

            .mesmerize-inner-page #page .page-content {
                padding-top: 0em;
            }

            .main {
                max-width: 1200px;
                margin: 0 auto;
                padding-left: 10px;
                padding-right: 10px;
            }

            .alle {
                width: 100%;
                background-color: #b2b2b2;
            }

            .alle_podcasts {
                display: grid;
                grid-template-columns: repeat(6, 1fr);
                grid-gap: 15px;
            }

            .alle_podcasts:before {
                display: none;
            }

            .alle_knap {
                display: inline;
                background-color: #e4254a;
                width: 100%;
                color: white;
                text-align: center;
                vertical-align: middle;
                padding-top: 43%;
                font-size: 1.5em;
                border-radius: 20px;
                cursor: pointer;
                grid-column: 6/7;
                grid-row: 2/3;
            }

            .kategori {
                display: grid;
                grid-template-columns: repeat(5, 1fr);
                grid-gap: 20px;
            }

            .kategori:before {
                display: none;
            }

            .laver {
                display: grid;
                grid-template-columns: repeat(5, 1fr);
                grid-gap: 20px;
            }

            .laver:before {
                display: none;
            }

            .page-content button {
                width: 100%;
                height: 100%;
                border: none;
                border-radius: 30px;
                background-color: #e5e5e5;
                font-weight: 600;
                font-size: 15px;
                cursor: pointer;
            }

            button.filter {
                display: grid;
                grid-template-rows: 75%;
            }

            button img {
                width: 40%;
                margin-top: 25%;
                margin-left: auto;
                margin-right: auto;
                padding-bottom: 55px;
            }

            [data-queen="4"] {
                padding-top: 37%;
                font-size: 40px !important;
            }

            @media only screen and (max-width: 800px) {
                button img {
                    padding-bottom: 40px;
                }
                [data-queen="4"] {
                    padding-top: 37%;
                    font-size: 30px !important;
                }
            }

            @media only screen and (max-width: 700px) {
                .alle_podcasts {
                    display: flex;
                    flex-direction: row;
                    overflow-x: scroll;
                }
                .alle_knap {
                    display: flex;
                    font-size: 3em;
                    padding-top: 20%;
                    line-height: initial;
                    padding-left: 120px;
                    padding-right: 120px;
                    ali
                }
                .billede {
                    width: 70%;
                }
                .kategori {
                    display: grid;
                    grid-template-columns: repeat(6, 25vw);
                    grid-template-rows: 1fr 1fr;
                    grid-gap: 7px;
                    overflow-x: scroll;
                }
                .kategori [data-queen="4"] {
                    grid-column: 1/3;
                    grid-row: 1/3;
                    font-size: 40px !important;
                }
                button img {
                    padding-bottom: 9vw;
                }
                button.filter {
                    grid-template-rows: 65%;
                }
                .page-content button {
                    font-size: 2.5vw;
                }
                .laver {
                    display: grid;
                    grid-template-columns: repeat(5, 25vw);
                    grid-template-rows: 1fr 1fr;
                    grid-gap: 7px;
                    overflow-x: scroll;
                }
                .laver [data-queen="19"] {
                    grid-column: 1/3;
                    grid-row: 1/3;
                }
            }

        </style>

        <!------- SCRIPT BEGYNDER ------->

        <script>
            let podcasts;
            let categories;
            let categories2;

            const dbUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/podcast?per_page=11";
            const catUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/categories?parent=22";
            const catUrl2 = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/categories?parent=23";

            async function getJson() {
                const data = await fetch(dbUrl);
                const catdata = await fetch(catUrl);
                const catdata2 = await fetch(catUrl2);

                podcasts = await data.json();
                categories = await catdata.json();
                categories2 = await catdata2.json();

                console.log(categories);
                console.log(podcasts);
                console.log(categories2);

                visPodcasts();
                opretKnapper();
                opretKnapper2();


            }


            function opretKnapper() {

                categories.forEach(cat => {
                    document.querySelector(".kategori").innerHTML += `<button class="filter" data-link=${cat.link} id="cat-${cat.id}" data-queen="${cat.id}">${cat.description}${cat.name}</button>`;

                })

                addEventListernesToButtons();

            }

            function opretKnapper2() {

                categories2.forEach(cat => {
                    document.querySelector(".laver").innerHTML += `<button class="filter" data-link=${cat.link} data-queen="${cat.id}">${cat.description}${cat.name}</button>`

                })

                addEventListernesToButtons();

            }

            function addEventListernesToButtons() {
                document.querySelectorAll(".main button").forEach(elm => {
                    elm.addEventListener("click", filtrering);

                })

            };

            function filtrering() {
                console.log("click");
                location.href = this.dataset.link;

            }



            //---------INDSÆTTER PODCASTS I KLON-------
            function visPodcasts() {
                const container = document.querySelector(".alle_podcasts");
                const template = document.querySelector("template").content;

                podcasts.forEach(podcast => {

                    const klon = template.cloneNode(true);
                    klon.querySelector(".billede").src = podcast.billede.guid;
                    klon.querySelector(".billede").addEventListener("click", () => visDetaljer(podcast));

                    container.appendChild(klon);

                })

            }

            document.querySelector(".alle_knap").addEventListener("click", allePodcasts);

            function allePodcasts() {
                location.href = "http://piilmanndesigns.dk/kea/09_cms/loud/alle-podcasts/";
            }

            function visDetaljer(hvilken) {
                location.href = hvilken.link;

            }


            getJson();

        </script>
