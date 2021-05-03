<!--<div <?php echo mesmerize_footer_container( 'footer-simple') ?>>-->
<!--    <div <?php echo mesmerize_footer_background( 'footer-content center-xs') ?>>-->
<div class="gridContainer">
    <!--            <div class="row middle-xs footer-content-row">-->
    <!--                <div class="footer-content-col col-xs-12">-->
    <div class="info_container">
        <div class="om_loud">
            <p class="bold mb">Om radio LOUD</p>
            <a href="">Mere LOUD</a><br>
            <a href="">Presse</a><br>
            <a href="">Job</a><br>
            <a href="">Praktikant på LOUD</a><br>
            <div class="some">
                <img src="<?php echo get_stylesheet_directory_uri()?>/template-parts/footer/facebook.png" alt="facebook">
                <img src="<?php echo get_stylesheet_directory_uri()?>/template-parts/footer/instagram.png" alt="facebook">
                <img src="<?php echo get_stylesheet_directory_uri()?>/template-parts/footer/youtube.png" alt="facebook">
            </div>
        </div>
        <div class="kontakt">
            <p class="bold">Radio LOUD</p>
            <p>Kontakt@radioloud.dk
                <br>+45 32 42 17 14
            </p>
            <p class="bold">Programredaktion</p>
            <p>Wildersgade 10B, 2. sal
                <br>1408 København
            </p>
            <p class="bold">Nyhedsredaktion</p>
            <p>Vestergade 165D, 2.sal
                <br> 5700 Svendborg
            </p>
        </div>


        <!--                </div>-->
        <!--            </div>-->
    </div>
</div>
<!--    </div>-->


<style>
    .gridContainer {
        width: 100%;
        max-width: 100%;
        background-color: #1f2338;
        padding: 30px;
        text-align: left !important;

    }

    .om_loud a {
        text-decoration: none;
        color: white;
    }

    .om_loud a:hover {
        color: #e4254a;
    }

    .bold {
        font-weight: 1000;
        font-size: 1.3rem;
    }

    .mb {

        margin-bottom: 1px;
    }

    .info_container {
        color: white;
    }

    .some {
        margin-left: -2.5vw;


    }

    .some img {

        width: 15vw;
        height: 15vw;
        padding: 10px;
    }


    @media only screen and (min-width: 600px) {

        .info_container {
            display: grid;
            grid-template-columns: repeat(9, 1fr);
            margin-left: 50px;
            margin-right: 50px;
            grid-gap: 20px;

        }

        .om_loud {

            grid-column-start: 4;
            grid-column-end: span 2;
            margin: 0 auto;
        }

        .some img {
            margin-top: 20px;
            width: 2vw;
            height: 2vw;

        }


        .some {
            margin-left: -0.5vw;


        }

        .kontakt {

            grid-column-start: 6;
            grid-column-end: span 1;
            margin: 0 auto;

        }
    }

</style>
