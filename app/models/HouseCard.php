<?php
require_once "Connexion.php";

class HouseCard {

    public function __construct() {
		$this->connect = new connexion;
	}
    public function oldGetHouseCard(){
		$query = $this->connect->getConnect()->prepare("SELECT 
			categories.categorie, 
			houses.price, 
			houses.idHouse, 
			houses.description,
			houses.photoHouse1
			FROM houses 
			INNER JOIN categories 
			ON houses.idCategorie = categories.idCategorie
			ORDER BY houses.idhouse DESC");
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		// echo "<pre>";
		// var_dump($result);
		// echo "</pre>";
		return $result;
	}

	public function getHouseCard(){

		// On se connecte à là base de données
		require_once('Connexion.php');

		// On détermine le nombre total d'articles
		$sql = 'SELECT COUNT(*) AS nb_articles FROM `houses`;';

		// On prépare la requête
		$query = $this->connect->getConnect()->prepare($sql);

		// On exécute
		$query->execute();

		// On récupère le nombre d'articles
		$countResult = $query->fetch();

		$nbArticles = (int) $countResult['nb_articles'];

		// On détermine le nombre d'articles par page
		$parPage = 6;

		// On calcule le nombre de pages total
		$pages = ceil($nbArticles / $parPage);

		// On détermine sur quelle page on se trouve
		if(isset($_GET['page']) && !empty($_GET['page'])){
			// tainaire
			($_GET['page'] <= 0) ? $currentPage = 1 : $currentPage = (int) strip_tags($_GET['page']);
			($_GET['page'] > $pages) ? $currentPage = $pages : $currentPage = (int) strip_tags($_GET['page']);
		}else{
			$currentPage = 1;
		}

		// Calcul du 1er article de la page
		$premier = ($currentPage * $parPage) - $parPage;

		$sql = 'SELECT 
		categories.categorie, 
		categories.idCategorie, 
		houses.price, 
		houses.idHouse, 
		houses.description,
		houses.photoHouse1,
		city.city
		FROM houses 
		INNER JOIN categories 
		ON houses.idCategorie = categories.idCategorie
		INNER JOIN city 
		ON houses.idCity = city.idCity
		ORDER BY houses.idhouse DESC
		LIMIT :premier, :parpage';

		// On prépare la requête
		$query = $this->connect->getConnect()->prepare($sql);

		$query->bindValue(':premier', $premier, PDO::PARAM_INT);
		$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

		// On exécute
		$query->execute();

		// On récupère les valeurs dans un tableau associatif
		$result = $query->fetchAll(PDO::FETCH_ASSOC);

		// trie le tableau en cour de test
		// $categories = 4;
		// $test = array();
		// foreach($result as $key => $result){
		// 	if($result['idCategorie'] == $categories){
		// 		// echo $result["categorie"];
		// 		$GLOBALS['result'][$key] = $result;
				
		// 	}
		// }
		// print_r($GLOBALS['result']);
		// exit;

		//on retourne les variable a reutiliser dans un tableau
		$result = array(
			"result"      => $result, 
			"pages"       => $pages, 
			"currentPage" => $currentPage
		);
		return $result;
	}

	public function getHouseCardFilter($ville, $categories){

		// On se connecte à là base de données
		require_once('Connexion.php');

		// On détermine le nombre total d'articles
		$sql = 'SELECT COUNT(*) AS nb_articles FROM `houses`';

		// On prépare la requête
		$query = $this->connect->getConnect()->prepare($sql);

		// On exécute
		$query->execute();

		// On récupère le nombre d'articles
		$countResult = $query->fetch();

		$nbArticles = (int) $countResult['nb_articles'];

		// On détermine le nombre d'articles par page
		$parPage = 4;

		// On calcule le nombre de pages total
		$pages = ceil($nbArticles / $parPage);

		// On détermine sur quelle page on se trouve
		if(isset($_GET['page']) && !empty($_GET['page'])){
			// tainaire
			($_GET['page'] <= 0) ? $currentPage = 1 : $currentPage = (int) strip_tags($_GET['page']);
			($_GET['page'] > $pages) ? $currentPage = $pages : $currentPage = (int) strip_tags($_GET['page']);
		}else{
			$currentPage = 1;
		}

		// Calcul du 1er article de la page
		$premier = ($currentPage * $parPage) - $parPage;

		// si on filtre par ville sans tenir compte de la categorie
		if($ville != "" && $categories == ""){
			$sql = 'SELECT 
			categories.categorie, 
			houses.price, 
			houses.idHouse, 
			houses.description,
			houses.photoHouse1,
			city.city
			FROM houses 
			INNER JOIN city 
			ON houses.idCity = city.idCity
			INNER JOIN categories 
			ON houses.idCategorie = categories.idCategorie
			WHERE city.idCity = :ville
			ORDER BY houses.idhouse DESC
			LIMIT :premier, :parpage';
			// On prépare la requête
			$query = $this->connect->getConnect()->prepare($sql);
			$query->bindValue(':ville', $ville, PDO::PARAM_INT);
		}
		// si on filtre par categorie sans tenircompte de la ville
		else if($categories != "" && $ville == ""){
			$sql = 'SELECT 
			categories.categorie, 
			houses.price, 
			houses.idHouse, 
			houses.description,
			houses.photoHouse1,
			city.city
			FROM houses 
			INNER JOIN city 
			ON houses.idCity = city.idCity
			INNER JOIN categories 
			ON houses.idCategorie = categories.idCategorie
			WHERE categories.idCategorie = :categories
			ORDER BY houses.idhouse DESC
			LIMIT :premier, :parpage';
			// On prépare la requête
			$query = $this->connect->getConnect()->prepare($sql);
			$query->bindValue(':categories', $categories, PDO::PARAM_INT);
		}
		// si on filtre par ville et par categorie
		else {
			$sql = 'SELECT 
			categories.categorie, 
			houses.price, 
			houses.idHouse, 
			houses.description,
			houses.photoHouse1,
			city.city
			FROM houses 
			INNER JOIN categories 
			ON houses.idCategorie = categories.idCategorie
			INNER JOIN city 
			ON houses.idCity = city.idCity
			WHERE city.idCity = :ville and categories.idCategorie = :categorie
			ORDER BY houses.idhouse DESC
			LIMIT :premier, :parpage';
			// On prépare la requête
			$query = $this->connect->getConnect()->prepare($sql);
			$query->bindValue(':ville', $ville, PDO::PARAM_INT);
			$query->bindValue(':categorie', $categories, PDO::PARAM_INT);
		}
		

		// ces valeur sont toujour requis
		$query->bindValue(':premier', $premier, PDO::PARAM_INT);
		$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

		// On exécute
		$query->execute();

		// On récupère les valeurs dans un tableau associatif
		$result = $query->fetchAll(PDO::FETCH_ASSOC);

		//on retourne les variable a reutiliser dans un tableau
		$result = array(
			"result"      => $result, 
			"pages"       => $pages, 
			"currentPage" => $currentPage
		);
		return $result;
	}
}


