<?php
require_once "Connexion.php";

class HouseManager {

    public function __construct() {
		$this->connect = new connexion;
	}

    public function setHouse($city, $categories, $water, $electricity, $statue, $street, $price, $descrition, $image_name1, $image_name2, $image_name3, $image_name4, $idUser){
        try {
			$sql = "INSERT INTO `houses` (
                houses.idHouse, 
                houses.electricity, 
                houses.water, 
                houses.description, 
                houses.street, 
                houses.add_date, 
                houses.price, 
                houses.idCity, 
                houses.idCategorie, 
                houses.idUser, 
                houses.photoHouse1, 
                houses.photoHouse2, 
                houses.photoHouse3, 
                houses.photoHouse4, 
                houses.statue) VALUES (NULL, :elec, :water, :descrip, :street, CURRENT_TIMESTAMP(), :price, :city, :categ, :idUser, :pic1, :pic2, :pic3, :pic4, :statue);
            ";
			$query = $this->connect->getConnect()->prepare($sql);
            
            $query->bindValue(':elec', $electricity, PDO::PARAM_INT);
		    $query->bindValue(':water', $water, PDO::PARAM_INT);
            $query->bindValue(':descrip', $descrition);
		    $query->bindValue(':street', $street);
            $query->bindValue(':price', $price, PDO::PARAM_INT);
		    $query->bindValue(':city', $city, PDO::PARAM_INT);
		    $query->bindValue(':categ', $categories, PDO::PARAM_INT);
		    $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
		    $query->bindValue(':pic1', $image_name1);
		    $query->bindValue(':pic2', $image_name2);
		    $query->bindValue(':pic3', $image_name3);
		    $query->bindValue(':pic4', $image_name4);
		    $query->bindValue(':statue', $statue);

            $result = $query->execute();
            //l'enregistrement de l'utilisateur est un succès
            $resultArray['insertIsOk'] = true;

		} catch (PDOException $e) {
            $msg = "probleme avec la base de donnée";
            $resultArray['insertIsOk'] = false;
		}
	}

}


