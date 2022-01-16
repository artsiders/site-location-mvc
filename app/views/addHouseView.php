<?php
// $root = $_SERVER["DOCUMENT_ROOT"];
// define("CONFIG_ROOT", "$root/site-location-mvc/");
// require(CONFIG_ROOT."_config.php");
?>

<link rel="stylesheet" href="<?= ASSETS; ?>css/addHouse.css">
<link rel="stylesheet" href="<?= ASSETS; ?>css/previewImage.css">
<link rel="stylesheet" type="text/css" href="<?= ASSETS; ?>font-awesome/css/font-awesome.min.css">

<div class="contentAdd hideContentAdd" data-key="cD">
    <div class="windowContentadd">
        <div class="titleBar">
            <i class="fa fa-close" id="closeBoxDetails" data-key="cD"></i>
        </div>

        <form method="POST" class="formContentAdd" id="addForm" enctype="multipart/form-data">
            <div class="picture1" onclick="defaultBtnActive()">
                <div class="wrapper">
                    <div class="image"> <img id="img" src="<?= ASSETS; ?>/images/empty.png" alt=""> </div>
                    <div class="content">
                        <div class="icon"> <i class="fa fa-upload"></i> </div>
                        <div class="text"> choisissez une image </div>
                    </div>
                    <div id="cancel-btn"> <i class="fa fa-times"></i> </div>
                    <div class="file-name"> File name here </div>
                </div>

                <!-- <div onclick="defaultBtnActive()" id="custom-btn">choisir l'image</div>  -->
                <input id="default-btn" class="inputFile" type="file" name="photoHouse1" hidden>
            </div>

            <div class="formInput">

                <!-- -------------------------------------------------------------- -->
                <!-- invisible pour l'utilisateur ------------------------------------- -->
                <input value="" style="display: none;" type="text" name="ville" id="addVille">
                <input value="" style="display: none;" type="text" name="categories" id="addCategories">
                <!-- END ----------------------------------------------------- -->

                <?php
                $city = new City;
                $resultCity = $city->getCity();
                ?>
                <!-- VILLE ------------------------------------------------ -->
                <label for="">ville</label>
                <div class="addSelect">
                    <div id="addSelect_value">
                        <span id="addSelect_text">ville</span>
                        <i class="fa fa-caret-down" id="addArrow_ville"></i>
                    </div>

                    <div id="addList_option" class="hide">
                        <?php foreach ($resultCity as $key => $resultCity) : ?>
                            <div class="options" data-key="<?= $resultCity['city']; ?>">
                                <i class="fa fa-map-marker"></i>
                                <p><?= $resultCity['city']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
                <?php
                $categorie = new Categorie;
                $resultCateg = $categorie->getCategorie();
                ?>
                <!-- CATEGORIES ------------------------------------------------ -->
                <label for="">categorie</label>
                <div class="addSelect">
                    <div id="addSelect_value_categories">
                        <span id="addSelect_text_categories">categories</span>
                        <i class="fa fa-caret-down" id="addArrow_catgories"></i>
                    </div>

                    <div id="addList_option_categories" class="hide">
                        <?php foreach ($resultCateg as $key => $resultCateg) : ?>
                            <div class="options" data-key="<?= $resultCateg['categorie']; ?>">
                                <i class="fa fa-map-marker"></i>
                                <p><?= $resultCateg['categorie']; ?></p>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
                <!-- -------------------------------------------------------------- -->

                <!-- <div id="checkStatue">
                    <input type="checkbox" name="electricity" id="electricity" checked>
                    <label for="electricity" data-key="check" title="cochez si vous avez de l'electriciter">
                        <img src="<?php //echo ASSETS; 
                                    ?>images/icons8_electrical_52px_1.png" alt="">
                    </label>

                    <input type="checkbox" name="water" id="water">
                    <label for="water" data-key="check" title="cochez si vous avez de l'eau courante">
                        <img src="<?php //echo ASSETS; 
                                    ?>images/icons8_plumbing_60px_1.png" alt="">
                    </label>

                    <input type="checkbox" name="statue" id="statue" checked>
                    <label for="statue" data-key="check" title="cochez si la maison est disponible">
                        <img src="<?php //echo ASSETS; 
                                    ?>images/icons8_open_sign_60px_1.png" alt="">
                    </label>
                    
                    <span>électricité</span>
                    <span>eau</span>
                    <span>disponible</span>
                </div> -->
                <!-- --------------------------------------------------------------------- -->

                <label for="street">quatier</label>
                <span class="spanStreet">
                    <input type="text" name="street" id="street" placeholder="situer dans quel quatier">
                </span>

                <label for="price">montant loyer</label>
                <span class="spanPrice">
                    <input type="number" name="price" id="addPrice">
                </span>

                <div id="checkStatue1">
                    <?php require_once "checkBox.php"; ?>
                </div>
            </div>

            <div class="morePicture">
                <label for="photoHouse2">
                    <i class="fa fa-upload"></i>
                    <input type="file" name="photoHouse2" accept="/*" onclick="previewImage();" id="photoHouse2">
                    <img id="preview2" alt="">
                </label>
                <label for="photoHouse3">
                    <i class="fa fa-upload"></i>
                    <input type="file" name="photoHouse3" accept="/*" onclick="previewImage();" id="photoHouse3">
                    <img id="preview3" alt="">
                </label>
                <label for="photoHouse4">
                    <i class="fa fa-upload"></i>
                    <input type="file" name="photoHouse4" accept="/*" onclick="previewImage();" id="photoHouse4">
                    <img id="preview4" alt="">
                </label>
            </div>

            <label for="description">description</label>
            <textarea name="descrition" id="description" placeholder="laissez une petite description sur la maison"></textarea>

            <input type="submit" id="btnAddHouse">

            <div class="space">
                <!-- espace -->
            </div>
        </form>

        <footer class="footerBar">
            get house
        </footer>
    </div>
</div>

<script src="<?= ASSETS; ?>js/jquery.js"></script>
<script src="<?= ASSETS; ?>js/ajax.js"></script>
<script>
    addHouseAjax();

    function previewImage() {
        // selectionne les input file
        var file2 = document.getElementById("photoHouse2").files;
        var file3 = document.getElementById("photoHouse3").files;
        var file4 = document.getElementById("photoHouse4").files;


        if (file2.length > 0) {
            // extensiation de l'objet FileReader
            var fileReader = new FileReader();
            // on charge limage dans son tag
            fileReader.onload = function(e) {
                document.getElementById("preview2").src = e.target.result;
            }
            // l'image qui est a l'index 0 du tableau
            fileReader.readAsDataURL(file2[0]);
        }
        if (file3.length > 0) {
            // extensiation de l'objet FileReader
            var fileReader = new FileReader();
            // on charge limage dans son tag
            fileReader.onload = function(e) {
                document.getElementById("preview3").src = e.target.result;
            }
            // l'image qui est a l'index 0 du tableau
            fileReader.readAsDataURL(file3[0]);
        }
        if (file4.length > 0) {
            // extensiation de l'objet FileReader
            var fileReader = new FileReader();
            // on charge limage dans son tag
            fileReader.onload = function(e) {
                document.getElementById("preview4").src = e.target.result;
            }
            // l'image qui est a l'index 0 du tableau
            fileReader.readAsDataURL(file4[0]);
        }



        // on relance la fonction aprés une seconder pour charger l'image
        setTimeout(previewImage, 1000);
    }



    // PREVIEW IMAGES___________________________________________________________
    const wrapper = document.querySelector(".wrapper");
    const fileName = document.querySelector(".file-name");
    const defaultBtn = document.querySelector("#default-btn");
    const customBtn = document.querySelector("#custom-btn");
    const cancelBtn = document.querySelector("#cancel-btn i");
    const img = document.querySelector("#img");
    let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

    function defaultBtnActive() {
        defaultBtn.click();
    }
    defaultBtn.addEventListener("change", function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                const result = reader.result;
                img.src = result;
                wrapper.classList.add("active");
            }
            cancelBtn.addEventListener("click", function() {
                img.src = "";
                wrapper.classList.remove("active");
            })
            reader.readAsDataURL(file);
        }
        if (this.value) {
            let valueStore = this.value.match(regExp);
            fileName.textContent = valueStore;
        }
    });
    // END PRVIEW IMAGE____________________________________________________________________

    // afficher le formulaire d'ajout de maison
    var contentAdd = document.querySelector('.contentAdd');

    contentAdd.addEventListener("click", (e) => {
        if (e.target.dataset.key == "cD") {
            contentAdd.classList.add('hideContentAdd');
        }
    });


    // variable declaration__________________________________________________
    var addVille = document.querySelector("#addVille");
    var addCategories = document.querySelector("#addCategories");

    var addSelectValue = document.querySelector("#addSelect_value");
    var addSelectValueCateg = document.querySelector("#addSelect_value_categories");

    var addArrow = document.querySelector("#addArrow_ville");
    var addArrowCateg = document.querySelector("#addArrow_catgories");

    var addSelectText = document.querySelector("#addSelect_text");
    var addSelectTextCateg = document.querySelector("#addSelect_text_categories");

    var addListOption = document.querySelector("#addList_option");
    var addListOptionCateg = document.querySelector("#addList_option_categories");
    // END ___________________________________________________________________


    // my select customise "VILLE"__________________________________________________
    addSelectValue.addEventListener("click", () => {
        addListOption.classList.toggle("hide");
        addArrow.classList.toggle("rotate");
    });
    addListOption.addEventListener("click", (e) => {
                // console.log(e.target.dataset.key);
                var key = e.target.dataset.key;
                addListOption.classList.toggle("hide");
                switch (key) {
                    <?php
                    $resultCity = $city->getCity();
                    ?>
                    <?php foreach ($resultCity as $key => $resultCity) : ?>
                        case "<?= $resultCity['city'] ?>":
                            addSelectText.innerHTML = key;
                            addVille.value = <?= $resultCity['idCity']; ?>;
                            break;
                        <?php endforeach; ?>
                }
                //erreur fictive de vs code......................
                <?= "})" ?>;


                // my select customise "CATEGORIES"__________________________________________________
                addSelectValueCateg.addEventListener("click", () => {
                    addListOptionCateg.classList.toggle("hide");
                    addArrowCateg.classList.toggle("rotate");
                });

                addListOptionCateg.addEventListener("click", (e) => {
                            // console.log(e.target.dataset.key);
                            var key = e.target.dataset.key;
                            switch (key) {

                                <?php
                                $resultCateg = $categorie->getCategorie();
                                ?>
                                <?php foreach ($resultCateg as $key => $resultCateg) : ?>
                                    case "<?= $resultCateg['categorie'] ?>":
                                        addSelectTextCateg.innerHTML = key;
                                        addCategories.value = <?= $resultCateg['idCategorie']; ?>;
                                        break;
                                    <?php endforeach; ?>

                            }
                            //erreur fictive de vs code.............................
                            <?= "addListOptionCateg.classList.toggle('hide');
	})" ?>;
                            // END __________________________________________________


                            <?= "</script>"; ?>