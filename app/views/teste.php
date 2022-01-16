<?php
    // SELECT users.prenom AS utilisateur, city.city AS ville FROM users INNER JOIN city ON users.idCity = city.idCity;
    // try {
    //     $connect = new PDO("mysql:host=localhost;dbname=location", "root", "");
    // } catch (PDOException $_e) {
    //     echo "ERREUR : ". $e->getMessage();
    // }

    // $query = $connect->prepare("SELECT * FROM users INNER JOIN houses ON id = idUser");
    // $query->execute();
    // $result = $query->fetchAll(PDO::FETCH_ASSOC);

    // echo "<pre>";
    // print_r($result);
    // echo "</pre>";



    require_once "../../_config.php";
    require_once MODEL."model.php";
    $user = new Users;
    $user->registerUser("salim", "salim", "salim", "salim", "salim", "salim", "");

    echo "<pre>";
    print_r($user);
    echo "</pre>";

    
