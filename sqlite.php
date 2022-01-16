<?php


try {
    $connect = new PDO("sqlite:location.db");
} catch (PDOException $_e) {
    echo "ERREUR : ". $e->getMessage();
}

// $query = $connect->prepare("SELECT * FROM users WHERE idUser = 7");
// $query = $connect->prepare("SELECT 
// 		categories.categorie, 
// 		houses.price, 
// 		houses.description,
// 		houses.photoHouse1
// 		FROM houses 
// 		INNER JOIN categories 
// 		ON houses.idCategorie = categories.idCategorie
//         ORDER BY houses.idhouse DESC");

$email = "jimsky699@gmail.com";

$query = $connect->prepare("SELECT firstName, lastName, email, pass, idcity, tel FROM users WHERE email = 'jimsky699@gmail.com'");

$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($result);
echo "</pre>";
