<?php

// require_once MODEL.'pagination.php';
require_once MODEL.'HouseCard.php';
$result = new HouseCard;

if(isset($_POST["ville"]) && !empty($_POST["ville"]) || isset($_POST["categories"]) && !empty($_POST["categories"])) {
    $ville = $_POST["ville"];
    $categories = $_POST["categories"];
    $result = $result->getHouseCardFilter($ville, $categories);
} 
else {
    $result = $result->getHouseCard();
}

//je decompose le tableau
$pages = $result["pages"];
$currentPage = $result["currentPage"];
$result = $result["result"];
?>