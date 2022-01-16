<?php
    // require_once "_config.php";
    require_once CONTROLER."controler.php";
    require_once "Connexion.php";

    class Users {
        private $firstName;
        private $lastName;
        private $email;
        private $pass;
        private $tel;
        private $sex;
        private $idCity;
        private $connect;

        public function __construct()
        {
            $this->connect = new connexion;
        }
    
    public function registerUser($firstName, $lastName, $email, $pass, $tel, $sex, $idCity) {

        $query = $this->connect->getConnect()->prepare ("INSERT INTO `users`
            (`idUser`, `firstName`, `lastName`, `email`, `pass`, `idCity`, `tel`, `sex`, `joinDate`) 
            VALUES (NULL, ?, ?, ?, ?, ?, ?, NOW())");
            
        $result = $query->execute(array($firstName, $lastName, $email, $pass, $tel, $sex, $idCity));
        
        return $result;

        
    }

}
?>