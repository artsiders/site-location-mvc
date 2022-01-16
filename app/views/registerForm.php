<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="site de location de maison">
    <!-- ------------------------------------------------------------------------------ -->
    <link rel="icon" href="<?= ASSETS; ?>images/iconGetHouse.png">
    <!-- ------------------------------------------------------------------------------ -->
    <link rel="stylesheet" href="<?= ASSETS; ?>font-awesome/css/font-awesome.min.css">
    <!-- ------------------------------------------------------------------------------ -->
    <link rel="stylesheet" href="<?= ASSETS; ?>css/registerForm.css">
    <title>GETHouse</title>
</head>

<body onload="ready();">
    <?php
    include_once "notificationbulle.php";
    include_once "loader.php";
    ?>
    <div class="contentForm">
        <form method="POST" enctype="multipart/form-data" id="registerForm">
            <span>
                <label for="name">nom</label>
                <input type="text" value="" name="firstName" id="firstName" autofocus>
            </span>
            <span>
                <label for="firstName">prenom</label>
                <input type="text" value="" name="lastName" id="lastName">
            </span>
            <span>
                <label for="email">email</label>
                <input type="email" value="" name="email" id="email">
            </span>
            <span>
                <label for="pass">mot de pass</label>
                <input type="password" value="" name="pass" id="pass">
            </span>
            <span>
                <label for="tel">telephone</label>
                <input type="tel" value="" name="tel" id="tel">
            </span>
            <span class="sexBox">
                <div>sexe</div>
                <span>
                    <label for="man" class="man check">homme</label>
                    <input type="radio" value="h" name="sex" id="man" checked>
                    <label for="woman" class="woman">femme</label>
                    <input type="radio" value="f" name="sex" id="woman">
                </span>
            </span>
            <span class="formCity">
                <!-- invisible pour l'utilisateur --------------------------------------- -->
                <input value="" style="display: none;" type="text" name="city" id="ville">
                <!-- END ----------------------------------------------------- -->
                <!-- MODEL -->
                <?php
                require MODEL . "City.php";
                require MODEL . "Categorie.php";
                $city = new City;
                $result = $city->getCity();
                ?>
                <!-- END model -->
                <!-- VILLE ------------------------------------------------ -->
                <label>ville</label>
                <div class="select">
                    <div id="select_value">
                        <span id="select_text">votre ville</span>
                        <i class="fa fa-caret-down" id="arrow_ville"></i>
                    </div>

                    <div id="list_option" class="hide">
                        <?php foreach ($result as $key => $result) : ?>
                            <div class="options" data-key="<?= $result['city']; ?>">
                                <i class="fa fa-map-marker"></i>
                                <p><?= $result['city']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </span>
            <span>
                <input type="submit" name="register" value="s'enregistrer" id="register">
            </span>
            <a href="./login" class="BtnturnToLogin">j'ai déjà un compte</a>
        </form>

        <div class="imageForm">
            <!-- image -->
        </div>
    </div>

    <script src="<?= ASSETS; ?>js/jquery.js"></script>
    <script src="<?= ASSETS; ?>js/ajax.js"></script>
    <script>
        // fonction
        registerAjax();
        // ****************************
        console.log(window.location);
        // CHECK SEX ____________________________
        var man = document.getElementById("man");
        var woman = document.getElementById("woman");

        var manClass = document.querySelector(".man");
        var womanClass = document.querySelector(".woman");

        man.addEventListener('click', (e) => {
            if (man.checked) {
                manClass.classList.add("check");
                womanClass.classList.remove("check");
            }
        });
        woman.addEventListener('click', (e) => {
            if (woman.checked) {
                womanClass.classList.add("check");
                manClass.classList.remove("check");
            }
        });
        // END check sex________________________________________________________

        // variable declaration__________________________________________________
        var ville = document.querySelector("#ville");

        var selectValue = document.querySelector("#select_value");

        var arrow = document.querySelector("#arrow_ville");

        var selectText = document.querySelector("#select_text");

        var listOption = document.querySelector("#list_option");
        // END ___________________________________________________________________


        // my select customise "VILLE"__________________________________________________
        selectValue.addEventListener("click", () => {
            listOption.classList.toggle("hide");
            arrow.classList.toggle("rotate");
        });
        listOption.addEventListener("click", (e) => {
                    // console.log(e.target.dataset.key);
                    var key = e.target.dataset.key;
                    listOption.classList.toggle("hide");
                    switch (key) {
                        <?php
                        $result = $city->getCity();
                        ?>
                        <?php foreach ($result as $key => $result) : ?>
                            case "<?= $result['city'] ?>":
                                selectText.innerHTML = key;
                                ville.value = <?= $result['idCity']; ?>;
                                break;
                            <?php endforeach; ?>
                    }
                    // after -----------------------------------------------
                    <?php echo "});
    // END __________________________________________________
</script>
</body>

</html>"; ?>