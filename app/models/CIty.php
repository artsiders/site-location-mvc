<?php
require_once "Connexion.php";

class City {

    public function __construct() {
		$this->connect = new connexion;
	}

	public function getCity(){
        $query = $this->connect->getConnect()->prepare("SELECT * FROM city ORDER BY city");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}