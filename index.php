<?php 
session_start();
require_once "_config.php";

/**
 * front controler 
 * fait appel au routeur
 * toutes les pages sont charger ici
 */

// mon fichier de configuration contenet les constates
require_once CLASSE."Routeur.php";

// la demande de la page via "action" passer dans l'url
$request = isset($_GET['action']) ? $request = $_GET['action'] : $request =  "empty";

$routeur = new Routeur($request);
$routeur->renderController();