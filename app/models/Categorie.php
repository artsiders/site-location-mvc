<?php
require_once "Connexion.php";

class Categorie {

    public function __construct() {
		$this->connect = new connexion;
	}

	public function getCategorie(){
        $query = $this->connect->getConnect()->prepare("SELECT * FROM categories ORDER BY categorie");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}