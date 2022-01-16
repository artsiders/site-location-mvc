<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="site de location de maison">
    <!-- ------------------------------------------------------------------------------ -->
    <link rel="icon" href="<?= ASSETS;?>images/iconGetHouse.png">
    <!-- ------------------------------------------------------------------------------ -->
    <link rel="stylesheet" href="<?= ASSETS;?>font-awesome/css/font-awesome.min.css">
    <!-- ------------------------------------------------------------------------------ -->
    <link rel="stylesheet" href="<?= ASSETS;?>css/loginForm.css">
    <!-- ------------------------------------------------------------------------------ -->
</head>

<body onload="ready();">
<?php
include_once "notificationbulle.php";
include_once "loader.php";
?>

<div class="contentForm">
    <div class="imageForm">
        <!-- image -->
    </div>
    <form method="POST" id="loginForm">
        <span>
            <label for="email">email</label>
            <input type="email" value="" name="email" id="email">
        </span>
        <span>
            <label for="pass">mot de passe</label>
            <input type="password" value="" name="pass" id="pass">
        </span>
        <span class="spanBtnLogin">
            <input type="submit" name="login" value="connexion" id="login">
            <a href="./register" class="BtnturnToRegister">créer un compte</a>
        </span>
    </form>
</div>

<script src="<?= ASSETS;?>js/jquery.js"></script>
<script src="<?= ASSETS;?>js/ajax.js"></script>
<script>
    loginAjax();
</script>

</body>
</html>