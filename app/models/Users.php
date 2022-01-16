<?php
require "../models/Connexion.php";
$connect = new connexion;
$connect = $connect->getConnect();

class Users{
    private $idUser;
    private $firstName;
    private $lastName;
    private $email;
    private $pass;
    private $tel;
    private $iDcity;
    private $photo_profil;
    private $joinDate;
    private $water;
    private $connect;

    public function __construct() {
		$this->connect= new connexion;
	}

    public function checkUser($firstName, $lastName, $email, $pass, $idcity, $tel){
        $sql = 'SELECT firstName, lastName, email, pass, idcity, tel FROM users WHERE email = ?';
        // $query = $this->connect->prepare($sql);
        // $query->execute(array($email));
        // $result = $query->fetchAll(PDO::FETCH_ASSOC);
        // return $result;
    }
}