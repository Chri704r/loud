<?php mesmerize_get_header(); ?>

<!--
<div id='page-content' class="page-content">
	<div class="<?php mesmerize_page_content_wrapper_class(); ?>">
		<?php
            while (have_posts()) : the_post();
                get_template_part('template-parts/content', 'front');
            endwhile;
            ?>
	</div>
-->

<main>

    <h1>LOUD Live</h1>

    <button id="dropdown">
        <p>Vis ugedage</p>
    </button>
    <nav id="filtrering">
    </nav>




    <button id="live">
        <p>AFSPIL LIVE</p>
    </button>




    <section class="container"></section>


    <template>
        <article>
            <div class="tid">
                <p></p>
            </div>

            <div class="billede">
                <img src="" alt="">
            </div>

            <div class="beskrivelse">
                <h3></h3>
                <p id="tekst"></p>
                <div class="mere_button"></div>
            </div>


        </article>
    </template>






</main>



<?php get_footer(); ?>
<div id="afspiller" class="hidden">
    <img src="<?php echo get_stylesheet_directory_uri()?>/img/afspiller.png" alt="afspiller" id="spiller" class="">


</div>



<style>
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');



    h1 {
        color: #E4254A;

    }

    article {
        display: grid;
        grid-template-columns: 12% 23% 65%;
        margin: 0 0 15px 0;
    }

    article div {
        padding: 5%;
    }

    article div img {
        width: 100%;
    }

    .tid {
        background-color: #F5F5F5;
    }

    .billede {
        background-color: #F5F5F5;
    }

    .beskrivelse {
        background-color: #F5F5F5;
    }

    article::before {
        display: none !important;
        content: none !important;
    }

    .ugedage {
        text-align: center;
    }

    main {
        margin: 0 10%;
    }

    #live {
        background-color: #E4254A;
        color: #fff;
        border-radius: 12px;
        border: none;
        padding: 15px 38px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-family: 'Lato', sans-serif;
        font-weight: 700;
        font-size: 1.3rem;
        margin: 0 0 13px 0;
        cursor: pointer
    }

    #live:active {
        background-color: #bb1636;
    }

    #live:hover {
        background-color: #bb1636;
    }

    .filter {
        background-color: #F1F1F1;
        color: #000;
        border-radius: 8px;
        border: none;
        padding: 10px 22px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-family: 'Lato', sans-serif;
        margin: 27px 1% 20px 0;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer
    }

    .min_active_dag {
        color: #E4254A;

    }

    .min_active {
        background-color: #BCBCBC;
    }

    .filter:hover {
        background-color: #BCBCBC;
    }

    .mere_button {
        padding: 0;
    }

    .mere_button button {
        background-color: #F5F5F5;
    }

    .mere_button button:hover {
        background-color: #F5F5F5;
    }

    .tid {
        color: #E4254A;
        font-family: 'Lato', sans-serif;
        font-weight: 700;
        font-size: 1.3rem;
        padding-top: 90%;
    }

    #dropdown {
        display: none;
        background-color: #F1F1F1;
        color: #000;
        border-radius: 8px;
        border: none;
        padding: 10px 22px;
        text-align: center;
        text-decoration: none;
        font-family: 'Lato', sans-serif;
        margin: 27px 1% 20px 0;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer
    }

    #dropdown:hover {
        background-color: #BCBCBC;
        cursor: pointer
    }


    #afspiller {
        position: relative;
        background-color: #F2F2F2;
        width: 100%;
        height: 4vw;
        border-color: black;
        border-style: solid;
        position: fixed;
        bottom: 0;
        display: grid;
        justify-content: center;
    }

    #afspiller img {
        width: 14vw;
        height: 4vw;
    }



    .hidden {
        display: none !important;
    }


    @media only screen and (max-width: 800px) {

        body {
            text-align: left !important;
        }

        main {
            margin: 0 4%;
        }

        .beskrivelse {
            text-align: left;
        }




    }


    @media only screen and (max-width: 700px) {

        body {
            text-align: left !important;
        }

        main {
            margin: 0 4%;
        }

        .beskrivelse {
            text-align: left;
        }

        #afspiller {
            position: relative;
            background-color: #F2F2F2;
            width: 100%;
            height: 20vw;
            border-color: black;
            border-style: solid;
            position: fixed;
            bottom: 0;
            display: grid;
            justify-content: center;
        }

        #afspiller img {
            width: 68vw;
            height: 20vw;
        }



    }

    @media screen and (max-width: 768px) {

        .filter {
            display: none;
        }


        #dropdown {
            display: block;

        }

        #filtrering {
            background-color: #E4254A;
            padding: 0 10%;
            border-radius: 11px;
        }

    }

</style>




<!------- SCRIPT BEGYNDER ------->
<script>
    "use strict";
    let podcasts;
    let categories;
    let filterDag;
    let isDropdownOpen = false;
    const dbUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/podcast?per_page=100";
    const catUrl = "http://piilmanndesigns.dk/kea/09_cms/loud/wp-json/wp/v2/ugedag";


    async function getJson() {
        console.log("getJson");

        const data = await fetch(dbUrl);
        const catdata = await fetch(catUrl);
        podcasts = await data.json();
        categories = await catdata.json();
        categories.sort((a, b) => (a.rakkefolge > b.rakkefolge) ? 1 : -1);
        console.log("categories", categories);

        let d = new Date().getDay();
        if (d == 0) {
            filterDag = 34;
        } else if (d == 1) {
            filterDag = 40
        } else if (d == 2) {
            filterDag = 39;
        } else if (d == 3) {
            filterDag = 38;
        } else if (d == 4) {
            filterDag = 37;
        } else if (d == 5) {
            filterDag = 36;
        } else if (d == 6) {
            filterDag = 35;
        }
        console.log("filterDag", filterDag);

        visPodcasts();
        opretKnapper();
        opretDropdown();



        document.querySelector("#live").addEventListener("click", afspillerClick);
    }

    function afspillerClick() {
        console.log(afspillerClick);
        document.querySelector("#afspiller").classList.remove("hidden");
        document.querySelector("#spiller").classList.remove("hidden");

        document.querySelector("#afspiller").addEventListener("click", stopAfspiller);

    }

     function stopAfspiller() {
        console.log(stopAfspiller);
        document.querySelector("#afspiller").classList.add("hidden");
        document.querySelector("#spiller").classList.add("hidden");



    }


    function opretKnapper() {
        console.log("opretKnapper");
        categories.forEach(cat => {
            if (cat.id == filterDag) {
                document.querySelector("#filtrering").innerHTML += `<button class="filter min_active_dag" data-dag="${cat.id}">${cat.name}</button>`
                console.log("filterDag", filterDag);
            } else {
                document.querySelector("#filtrering").innerHTML += `<button class="filter" data-dag="${cat.id}">${cat.name}</button>`
            }
        })

        addEventListenersToButtons();
    }

    function opretDropdown() {
        document.querySelector("#dropdown").addEventListener("click", openDropdown);
    }

    function openDropdown() {

        if (isDropdownOpen == false) {


            document.querySelectorAll(".filter").forEach(elm =>
                elm.style.display = "block");
            document.querySelector("#filtrering").style.position = "fixed";
        } else {
            document.querySelectorAll(".filter").forEach(elm =>
                elm.style.display = "none");
            // Det der skal ske når den skal lukke igen
        }
        isDropdownOpen = !isDropdownOpen;
    }






    function addEventListenersToButtons() {
        console.log("addEventListenersToButtons")
        document.querySelectorAll("#filtrering button").forEach(elm =>
            elm.addEventListener("click", filtrering));
    }


    function filtrering() {
        console.log("filtrering", this)
        filterDag = this.dataset.dag;
        console.log("filterDag", filterDag);

        visPodcasts();


        document.querySelectorAll("#filtrering button").forEach(elm =>
            elm.classList.remove("min_active"));


        this.classList.add("min_active");



    }

    function visPodcasts() {


        console.log("podcast");



        let temp = document.querySelector("template");
        let container = document.querySelector(".container")
        container.innerHTML = "";
        console.log("podcasts: ", podcasts);
        podcasts.forEach(podcast => {
            if (podcast.sendeplan == filterDag) {
                let klon = temp.cloneNode(true).content;
                klon.querySelector(".tid").innerHTML = podcast.tidspunkt;
                klon.querySelector("article").setAttribute("id", `pid_${podcast.id}`);
                klon.querySelector("img").src = podcast.billede.guid;
                klon.querySelector("h3").innerHTML = podcast.title.rendered;

                klon.querySelector("#tekst").textContent = podcast.podcast_beskrivelse.substring(0, 180) + "...";
                klon.querySelector(".mere_button").innerHTML += `<button>Læs mere</button>`
                klon.querySelector(".mere_button").addEventListener("click", () => visMere(podcast));

                container.appendChild(klon);

            }
        })

    }







    //-------VIS MERE KNAP-------
    function visMere(podcast) {
        console.log("visMere");

        document.querySelector(".mere_button").removeEventListener("click", () => visMere(podcast));

        document.querySelector(`#pid_${podcast.id}`).querySelector("#tekst").textContent = podcast.podcast_beskrivelse;

        document.querySelector(`#pid_${podcast.id}`).querySelector(".mere_button").innerHTML = `<button>Læs mindre</button>`


        document.querySelector(`#pid_${podcast.id}`).querySelector(".mere_button").addEventListener("click", () => visMindre(podcast));

    }


    //-------VIS MINDRE KNAP--------
    function visMindre(podcast) {
        document.querySelector(`#pid_${podcast.id}`).querySelector("#tekst").textContent = podcast.podcast_beskrivelse.substring(0, 180) + "...";

        document.querySelector(`#pid_${podcast.id}`).querySelector(".mere_button").innerHTML = `<button>Læs mere</button>`

        document.querySelector(`#pid_${podcast.id}`).querySelector(".mere_button").addEventListener("click", () => visMere(podcast));
    }

    getJson();

</script>
