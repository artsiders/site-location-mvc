<?php

/**
 * les cofiguration de l'application
 */

// creation des chemins absolu_________________________
$root = $_SERVER["DOCUMENT_ROOT"];
$host = $_SERVER["HTTP_HOST"];

define("ROOT", "$root/site-location-mvc/");
define("HOST", "http://"."$host/site-location-mvc/");

define("ASSETS_ROOT", ROOT . 'assets/');
define("ASSETS", HOST . 'assets/');

define("MODEL", ROOT . 'app/models/');
define("VIEW", ROOT . 'app/views/');
define("CONTROLER", ROOT . 'app/controlers/');
define("CLASSE", ROOT . 'app/classes/');

define("MODEL_HOST", HOST . 'app/models/');
define("VIEW_HOST", HOST . 'app/views/');
define("CONTROLER_HOST", HOST . 'app/controlers/');
define("CLASSE_HOST", HOST . 'app/classes/');



// END chemins absolu__________________________________
