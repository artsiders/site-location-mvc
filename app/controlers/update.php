<?php
$root = $_SERVER["DOCUMENT_ROOT"];
define("CONFIG_ROOT", "$root/site-location-mvc/");
require(CONFIG_ROOT."_config.php");
?>

<?php

if(isset($_POST) && !empty($_POST)) {

    $resultArray = array(
        "msg" => "",
        "inputPhotoHouse1" => true,
        "inputCity" => true,
        "inputCategorie" => true,
        "inputStreet" => true,
        "inputPrice" => true,
        "inputDescription" => true,
        "isOk" => true,
        "insertIsOk" => true
    );

    $city = $_POST["ville"];
    $categories = $_POST["categories"];
    (isset($_POST['water'])) ? $water = "1" : $water = "0";
    (isset($_POST['electricity'])) ? $electricity = "1" : $electricity = "0";
    (isset($_POST['statue'])) ? $statue = "disponible" : $statue = "indisponible";
    $street = htmlspecialchars($_POST['street']);
    $price = htmlspecialchars($_POST['price']);
    $descrition = htmlspecialchars($_POST['descrition']);
    

    if(empty($descrition)){
        $resultArray["inputDescription"] = false;
        $resultArray["isOk"] = false;
        $resultArray["msg"] = "renseignez une petite description sur la maison";
    }
    if(empty($price)){
        $resultArray["inputPrice"] = false;
        $resultArray["isOk"] = false;
        $resultArray["msg"] = "renseignez un prix s'il vous plait";
    }
    if(empty($street)){
        $resultArray["inputStreet"] = false;
        $resultArray["isOk"] = false;
        $resultArray["msg"] = "renseignez votre quartier ville s'il vous plait";
    }
    if(empty($categories)){
        $resultArray["inputCategorie"] = false;
        $resultArray["isOk"] = false;
        $resultArray["msg"] = "selectionner une categories s'il vous plait";
    }
    if(empty($city)){
        $resultArray["inputCity"] = false;
        $resultArray["isOk"] = false;
        $resultArray["msg"] = "selectionner une ville s'il vous plait";
    }
    

    if(!empty($_FILES['photoHouse1']['name'])) {
        $image_name1 = $_FILES['photoHouse1']['name'];
        $file_tmp_name = $_FILES['photoHouse1']['tmp_name'];
        move_uploaded_file($file_tmp_name, ASSETS_ROOT."images/$image_name1");
        $resultArray["inputPhotoHouse1"] = true;

    } else {
        $resultArray["inputPhotoHouse1"] = false;
        $resultArray["isOk"] = false;
        $resultArray["msg"] = "la premier image est obligatoire";
    }

    // auther images
    if(isset($_FILES['photoHouse2']['name']) AND !empty($_FILES['photoHouse2']['name'])){
        $image_name2 = $_FILES['photoHouse2']['name'];
        $file_tmp_name = $_FILES['photoHouse2']['tmp_name'];
        move_uploaded_file($file_tmp_name, ASSETS_ROOT."images/$image_name2");
    } else {
        $image_name2 = "Default.png";
    }
    if(isset($_FILES['photoHouse3']['name']) AND !empty($_FILES['photoHouse3']['name'])){
        $image_name3 = $_FILES['photoHouse3']['name'];
        $file_tmp_name = $_FILES['photoHouse3']['tmp_name'];
        move_uploaded_file($file_tmp_name, ASSETS_ROOT."images/$image_name3");
    } else {
        $image_name3 = "Default.png";
    }
    if(isset($_FILES['photoHouse4']['name']) AND !empty($_FILES['photoHouse4']['name'])){
        $image_name4 = $_FILES['photoHouse4']['name'];
        $file_tmp_name = $_FILES['photoHouse4']['tmp_name'];
        move_uploaded_file($file_tmp_name, ASSETS_ROOT."images/$image_name4");
    } else {
        $image_name4 = "Default.png";
    }


    $idUser = 2;
    // si le formulair est bien rempli, j'envoie les information dans la base de donnée
	if($resultArray['isOk']){
        require MODEL."HouseManager.php";
        $result = new HouseManager;
        // ajoute la maison dans la base de donnée
		$result = $result->setHouse($city, $categories, $water, $electricity, $statue, $street, $price, $descrition, $image_name1, $image_name2, $image_name3, $image_name4, $idUser);
	}
    
    echo json_encode($resultArray);

}