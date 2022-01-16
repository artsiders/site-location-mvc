<?php
require_once "Connexion.php";

class UsersManager {

    public function __construct() {
		$this->connect = new connexion;
	}
    public function checkUsers($email){
        $sql = 'SELECT firstName, lastName, email, pass, idcity, tel FROM users WHERE email = ?';
        $query = $this->connect->getConnect()->prepare($sql);
        $query->execute(array($email));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        // $firstName = $result[0]["firstName"];
		return $result;
	}
    public function setUser($firstName, $lastName, $email, $pass, $city, $tel, $sex){
        try {
			$sql = "INSERT INTO `users` (`idUser`, `firstName`, `lastName`, `email`, `pass`, `idCity`, `tel`, `joinDate`, `sex`) 
                VALUES (NULL, ?, ?, ?, ?, ?, ?, NOW(), ?)";
			$query = $this->connect->getConnect()->prepare($sql);
            $result = $query->execute(array($firstName, $lastName, $email, $pass, $city, $tel, $sex));
            //l'enregistrement de l'utilisateur est un succès
            $resultArray['insertIsOk'] = true;

		} catch (PDOException $e) {
            $msg = "E_bd";
            $resultArray['insertIsOk'] = false;
		}

		return $result;
	}

}


