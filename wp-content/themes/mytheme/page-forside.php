<?php mesmerize_get_header(); ?>

    <div id='page-content' class="page-content">
        <div class="<?php mesmerize_page_content_wrapper_class(); ?>">
            <?php
            while (have_posts()) : the_post();
                get_template_part('template-parts/content', 'front');
            endwhile;
            ?>
        </div>
    </div>

    <?php get_footer(); ?>


        <!------- SCRIPT BEGYNDER ------->
        <script>
            let queens;
            let categories;
            let filterQueen = "alle";

            console.log("hej");

            const dbUrl = "https://piilmanndesigns.dk/kea/09_cms/passionssite/wp-json/wp/v2/queen?per_page=100";
            const catUrl = "https://piilmanndesigns.dk/kea/09_cms/passionssite/wp-json/wp/v2/categories";

            async function getJson() {
                const data = await fetch(dbUrl);
                const catdata = await fetch(catUrl);
                queens = await data.json();
                categories = await catdata.json();
                console.log(categories);
                console.log(queens);


                visQueens();
                opretKnapper();
            }


            function opretKnapper() {

                categories.forEach(cat => {
                    document.querySelector("#filtrering").innerHTML += `<button class="filter" data-queen="${cat.id}">${cat.name}</button>`
                })

                addEventListernesToButtons();

            }

            function addEventListernesToButtons() {
                document.querySelectorAll("#filtrering button").forEach(elm => {
                    elm.addEventListener("click", filtrering);
                })

            };

            function filtrering() {
                filterQueen = this.dataset.queen;
                console.log(filterQueen);

                visQueens();
            }


            //---------INDSÆTTER RETTER I KLON-------
            function visQueens() {
                const container = document.querySelector(".retcontainer");
                const template = document.querySelector("template").content;

                container.innerHTML = "";

                queens.forEach(queen => {
                    if (filterQueen == "alle" || queen.categories.includes(parseInt(filterQueen))) {
                        const klon = template.cloneNode(true);
                        klon.querySelector("h2").textContent = queen.navn;
                        klon.querySelector(".billede").src = queen.billede.guid;
                        klon.querySelector("article").addEventListener("click", () => {
                            location.href = queen.link;
                        })
                        container.appendChild(klon);
                    }
                })


            }

            getJson();

        </script>
