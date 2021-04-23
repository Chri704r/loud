<?php mesmerize_get_header(); ?>

    <div id='page-content' class="page-content">
        <div class="main">

            <h2>Alle podcasts</h2>
            <section class="alle_podcasts">
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

            h2 {
                margin-top: 40px;
                font-size: 1.8em;
                line-height: 0.1em;
                margin-bottom: 25px;
            }

            .billede {
                border-radius: 20px;
            }

            .mesmerize-inner-page #page .page-content {
                padding-top: 0em;
            }

            .main {
                max-width: 1200px;
                margin: 0 auto;
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

            .alle_podcasts:after {
                content: "Se alle";
                display: inline;
                background-color: #e4254a;
                width: 100%;
                color: white;
                text-align: center;
                vertical-align: middle;
                padding-top: 43%;
                font-size: 1.5em;
                border-radius: 20px;
            }

            .kategori {
                display: grid;
                grid-template-columns: repeat(5, 1fr);
                grid-auto-rows: 1fr;
                grid-gap: 20px;
            }

            .kategori:before {
                display: none;
            }

            .laver {
                display: grid;
                grid-template-columns: repeat(5, 1fr);
                grid-auto-rows: 1fr;
                grid-gap: 20px;
            }

            .laver:before {
                display: none;
            }

            .page-content button {
                width: 100%;
                height: 100%;
                /*                height: 200px;*/
                border: none;
                border-radius: 30px;
                background-color: #e5e5e5;
                font-weight: 600;
                font-size: 15px;
            }

            button.filter {
                display: grid;
                grid-template-rows: 80%;
            }

            button img {
                width: 60%;
                margin-top: 15%;
                margin-left: auto;
                margin-right: auto;
                padding-bottom: 45px;
            }

            [data-queen="4"] {
                padding-top: 40%;
                font-size: 30px !important;
            }

            @media only screen and (max-width: 700px) {
                .alle_podcasts {
                    display: flex;
                    flex-direction: row;
                    overflow-x: scroll;
                }
                .billede {
                    width: 70%;
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
                    document.querySelector(".kategori").innerHTML += `<button class="filter" data-queen="${cat.id}">${cat.description}${cat.name}</button>`
                })

                addEventListernesToButtons();

            }

            function opretKnapper2() {

                categories2.forEach(cat => {
                    document.querySelector(".laver").innerHTML += `<button class="filter" data-queen="${cat.id}">${cat.description}${cat.name}</button>`
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
                //                            filterQueen = this.dataset.queen;
                //location.href = `archive.php?id=${}`;

            }
            //
            //            function filtrering() {
            //                klon.querySelector("article").addEventListener("click", () => {
            //                    location.href = cat.link;
            //                })
            //            }


            //            location.href = `detail.html?id=${hvem._id}`;


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

            function visDetaljer(hvem) {
                location.href = hvem.link;

            }


            getJson();

        </script>
