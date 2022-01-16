<?php
// $root = $_SERVER["DOCUMENT_ROOT"];
// define("CONFIG_ROOT", "$root/site-location-mvc/");
// require(CONFIG_ROOT."_config.php");
?>

<link rel="stylesheet" href="<?= ASSETS;?>css/houseDetails.css">
<link rel="stylesheet" type="text/css" href="<?= ASSETS;?>font-awesome/css/font-awesome.min.css">

<div class="contentDetails hideContentDetails" data-key="cD">
    <div class="windowContentDetails">
        <div class="titleBar">
            <i class="fa fa-close" id="closeBoxDetails" data-key="cD"></i>
        </div>

        <section class="boxContentDetails">
            <div class="housePicture">
                <!-- <img src="<?php //echo ASSETS;?>images/picEmty.png" alt=""> -->
            </div>

            <div class="houseDetails">
                <div class="textDetails">
                    <i class="fa fa-calendar"></i>
                    <span id="date">20/04/2021</span>
                    <i class="fa fa-home"></i>
                    <span id="categorie">studio</span>
                    <i class="fa fa-map-marker"></i>
                    <span id="city">bafoussam</span>
                    <i class="fa fa-dollar"></i>
                    <span id="price"></span>
                    <!-- premium -->
                </div>
                <div class="checkDetails">
                    <!-- check details -->
                    <div class="checkWater">
                        <i class="fa fa-shower"></i>
                    </div>
                    <div class="checkElectricity">
                    <i class="fa fa-lightbulb-o"></i>
                    </div>
                    <div class="checkStatue">
                        
                    </div>
                </div>
            </div>

            <div class="autherPicture">
                <!-- <img src="<?php //echo ASSETS;?>images/picEmty.png" alt=""> -->
                <!-- <img src="<?php //echo ASSETS;?>images/picEmty.png" alt=""> -->
                <!-- <img src="<?php //echo ASSETS;?>images/picEmty.png" alt=""> -->
                <!-- <img src="<?php //echo ASSETS;?>images/picEmty.png" alt=""> -->
            </div>

            <div class="boxPremium">
                <p>
                souscrivez a un abonnement Premium pour obtenir le contact du propriétaire et la localisation de la maison
                </p>
                <a href="#"><button>abonnement Premium <i class="fa fa-external-link"></i> </button></a>
            </div>
        </section>

        <div class="footerBar">
            get house
        </div>
    </div>
</div>

<script>
    var contentDetails = document.querySelector('.contentDetails');

    contentDetails.addEventListener("click", (e) => {
        if(e.target.dataset.key == "cD"){
            contentDetails.classList.add('hideContentDetails');
        }
    });
</script>