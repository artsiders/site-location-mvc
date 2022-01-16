<?php  
session_start();


$root = $_SERVER["DOCUMENT_ROOT"];
define("CONFIG_ROOT", "$root/site-location-mvc/");
require(CONFIG_ROOT."_config.php");

require MODEL."Connexion.php";



$connect = new connexion;
$connect = $connect->getConnect();

// simulation de la varible POST pour les test
// $_POST = array("email" => "jimsky699@gmail.com", "pass" => "azerty");

if(isset($_POST) AND !empty($_POST))
{
    $resultArray = array(
        "msg" => "",
        "inputEmail" => "",
        "inputPass" => "",
        "isOk" => false
    );

    $email = $_POST["email"];
    $pass = $_POST["pass"];

    

    if(empty($email))
    {
        $resultArray['msg'] = "entrer votre adresse email !";
        $resultArray['inputEmail'] = false;
    } else {
        require_once MODEL."UsersManager.php";
        $result = new UsersManager;
        $result = $result->checkUsers($email);

        if(count($result) == 1) {
            if(empty($pass)) {
                $resultArray['msg'] = "entrez votre mot de passe";
                $resultArray['inputPass'] = false;
            } else {
                // verification du mot de passe
                if(password_verify($pass, $result[0]["pass"])){
                    $_SESSION['user']  = $result;
                    $resultArray['isOk'] = true;
                } else {
                    $resultArray['msg'] = "mot de passe incorrect :(";
                    $resultArray['inputPass'] = false;
                }
            }
            $resultArray['inputEmail'] = true;
        }
        else{
            $resultArray['msg'] = "le compte n'exite pas :(";
            $resultArray['inputEmail'] = false;
        }
    }
    echo json_encode($resultArray);
}