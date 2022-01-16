<?php 
// resume sur la poo en php 
// namespace app\entity;

class house
{
    private $id;
    private $electricity;
    private $water;
    private $description;
    private $street;
    private $addDate;
    private $price;
    private $idCity;
    private $idCategorie;
    private $idUser;

    
    // les SETTER pour definire les propriete 'private' a parti de l'exterieur de la class
    public function setElectricity($electricity)
    {
        $this->electricity = $electricity;
        return $this;
    }
    public function setWater($water)
    {
        $this->water = $water;
        return $this;
    }
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }
    public function setAddDate($addDate)
    {
        $this->addDate = $addDate;
        return $this;
    }
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }
    public function setIdCity($idCity)
    {
        $this->idCity = $idCity;
        return $this;
    }
    public function setIdCategorie($idCategorie)
    {
        $this->idCategorie = $idCategorie;
        return $this;
    }
    public function setIdIser($idUser)
    {
        $this->idUser = $idUser;
        return $this;
    }
    // les GETTER pour definire les propriete 'private' a parti de l'exterieur de la class
    public function getElectricity()
    {
        return $this->electricity;
    }
    public function getWater()
    {
        return $this->water;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getStreet()
    {
        return $this->street;
    }
    public function getAddDate()
    {
        return $this->addDate;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getIdCity()
    {
        return $this->idCity;
    }
    public function getIdCategorie()
    {
        return $this->idCategorie;
    }
    public function getIdIser()
    {
        return $this->idUser;
    }

}
