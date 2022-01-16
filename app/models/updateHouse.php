<?php

if(isset($_GET['idHouse'])){
	getHouseDetails($_GET['idHouse']);
}

function getHouseDetails($idHouse){
    require_once "Connexion.php";

    $connect = new connexion;
    $connect = $connect->getConnect();

	$sql = "SELECT
		categories.categorie,
		city.city,
		users.firstName,
		users.lastName,
		users.email,
		users.photo_profil,
		houses.electricity, 
		houses.water, 
		houses.description,
		houses.street,
		DATE_FORMAT(houses.add_date, '%d/%m/%Y') AS add_date,
		houses.price,
		houses.statue,
		houses.photoHouse1,
		houses.photoHouse2,
		houses.photoHouse3,
		houses.photoHouse4
		FROM houses 
		INNER JOIN categories 
		ON houses.idCategorie = categories.idCategorie
		INNER JOIN city
		ON houses.idCity = city.idCity
		INNER JOIN users
		ON houses.idUser = users.idUser
		WHERE houses.idHouse = :idHouse
	";

	$query = $connect->prepare($sql);
	//set id bind param
	$query->bindParam('idHouse', $idHouse);

	$query->execute();
	$result = $query->fetch(PDO::FETCH_ASSOC);
	// echo '<pre>';
	// print_r($result);
	// echo "</pre>";

	echo json_encode($result);
}