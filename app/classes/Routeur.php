<?php
/**
 * class Routeur
 * 
 * create route and find controller
 */
class Routeur{
    
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function renderController()
    {
        try {
            if(isset($this->request)) {
                if($this->request == "home"){
                    
                    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                        require VIEW."home.php";

                        if($this->request == "login"){
                            require VIEW."home.php";
                        }
                    } else {
                        // throw new Exception("je renvoie ver la page login");
                        require_once VIEW."loginForm.php";
                    }
                }
                else if($this->request == "register"){
                    require_once VIEW."registerForm.php";
                }
                else if($this->request == "empty"){
                    require_once VIEW."loginForm.php";
    
                }
                else if($this->request == "login"){
                    require_once VIEW."loginForm.php";
                }
                else if($this->request == "logOut"){
                    require_once MODEL."loginOut.php";
                }
                else{
                    // si l'action n'est pas vide et n'exite pas !
                    if(!empty($this->request)){
                       throw new Exception("<h1><center><strong>ERREUR 404</strong> <br> la page demander n'exite pas :(</center></h1>");
                    } else {
                        require_once VIEW."loginForm.php";
                    }
                }
            }
            else{
                echo "404";
            }
        } catch (Exception $e) {
            echo "ERREUR : ". $e->getMessage();
        }
    }
    
}