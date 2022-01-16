<?php


$root = $_SERVER["DOCUMENT_ROOT"];
define("CONFIG_ROOT", "$root/site-location-mvc/");
require(CONFIG_ROOT."_config.php");

require MODEL."Connexion.php";


$connect = new connexion;
$connect = $connect->getConnect();

if(isset($_POST) && !empty($_POST))
{

    $resultArray = array(
        "msg" => "",
        "inputFirstName" => true,
        "inputLastName" => true,
        "inputEmail" => true,
        "inputPass" => true,
        "inputTel" => true,
        "inputEmailAlready" => true,
        "isOk" => true,
    );

    $firstName = htmlspecialchars($_POST["firstName"]);
    $lastName  = htmlspecialchars($_POST["lastName"]);
    $email     = htmlspecialchars($_POST["email"]);
    $pass      = htmlspecialchars($_POST["pass"]);
    $tel       = htmlspecialchars($_POST["tel"]);
    $sex       = $_POST["sex"];
    $city      = $_POST["city"];
    // $photo_profil = "default_profil.jpg";

    // verification et validation du formulaire
    if(strlen($pass) < 6){
        $resultArray['inputPass'] = false;
        $resultArray['isOk'] = false;
        $resultArray['msg'] = "le mot de pass doit contenir minimum 6 carractère";
        // echo "<br>error_pass";
    }
    if(empty($pass)){
        $resultArray['inputPass'] = false;
        $resultArray['isOk'] = false;
        $resultArray['msg'] = "entre un mot de passe s'il vous plait";
        // echo "<br>error_pass";
    }
    if(empty($tel)){
        $resultArray['inputTel'] = false;
        $resultArray['isOk'] = false;
        $resultArray['msg'] = "entrer votre numero de téléphone";
        // echo "<br>error_pass";
    }
    if(empty($email)){
        $resultArray['inputEmail'] = false;
        $resultArray['isOk'] = false;
        $resultArray['msg'] = "l'adresse Email est obligatoire";
        // echo "<br>email";
    }
    if(empty($lastName)){
        $resultArray['inputLastName'] = false;
        $resultArray['isOk'] = false;
        $resultArray['msg'] = "entrer votre prenom";
        // echo "<br>lastName";
    }
    if(empty($firstName)){
        $resultArray['inputFirstName'] = false;
        $resultArray['isOk'] = false;
        $resultArray['msg'] = "entrer votre nom";
        // echo "<br>error_firstName";
    }

    //je verifie si l'email exite déjà dans la bose de donnée____________________
    if(!empty($email)){
        require_once MODEL."UsersManager.php";
        $result = new UsersManager;
        $result = $result->checkUsers($email);

        if(count($result) != 0){
            $resultArray['inputEmailAlready'] = false;
            $resultArray['inputEmail'] = false;
            $resultArray['isOk'] = false;
            $resultArray['msg'] = "l'adresse Email existe déjà";
        } 
        else { //si tout est OK on crypte le mot de pass
            $pass = password_hash($pass, PASSWORD_DEFAULT);
        }
    }
    // END ________________________________________________________________________________

	// si le formulair est bien rempli, j'envoie les information dans la base de donnée
	if($resultArray['isOk']){
        $result = new UsersManager;
		$result = $result->setUser($firstName, $lastName, $email, $pass, $city, $tel, $sex);
	}
    echo json_encode($resultArray);


}