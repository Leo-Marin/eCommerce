<?php

require_once File::build_path(array("controller","ControllerLivre.php"));
require_once File::build_path(array("controller", "ControllerAuteur.php"));
require_once File::build_path(array("controller", "ControllerEditeur.php"));
require_once File::build_path(array("controller", "ControllerUtilisateur.php"));
require_once File::build_path(array("controller", "ControllerCommande.php"));
// On recupère l'action passée dans l'URL




if (!isset($_GET["controller"])){
    if (!isset($_POST["controller"])){
    $controller = "livre";
    }
    else{
        $controller = $_POST["controller"];
    }
}
else{
    $controller = $_GET["controller"];
}


if (!class_exists("Controller" . ucfirst($controller))){
    $action = "error";  
    $controller_class = "ControllerLivre";
}
else{
    $controller_class = "Controller" . ucfirst($controller);
}



if (!isset($_GET["action"])){
    if (!isset($_POST["action"])){
        $action = "readAll";    }
    else if(!in_array($_POST["action"], get_class_methods($controller_class))){
    $action = "error";}
    else {
        $action = $_POST["action"];    }}


else if(!in_array($_GET["action"], get_class_methods($controller_class))){
    $action = "error";
}
else{
    $action = $_GET["action"];
}


// Appel de la méthode statique $action de ControllerVoiture
$controller_class::$action(); 

?>


