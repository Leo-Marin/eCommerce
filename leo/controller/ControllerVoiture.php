<?php

require_once File::build_path(["model", "ModelVoiture.php"]);

class ControllerVoiture {

    public static function readAll() {
        $view = 'list';
        $pagetitle = 'Liste des voitures';
        $controller = 'voiture';
        $tab_v = ModelVoiture::getAllVoitures();     //appel au modèle pour gerer la BD
        require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
    }

    public static function read() {
        $controller = 'voiture';
        $pagetitle = 'Voiture Caracterisations';
        $immat = $_GET['immatriculation'];
        $v = ModelVoiture::getVoitureByImmat($immat);

        if ($v == null) {
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        } else {
            $view = 'detail';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function create() {
        $view = 'create';
        $pagetitle = 'Creation voiture';
        $controller = 'voiture';

        require File::build_path(array("view", "view.php"));
    }

    public static function created() {
        $immat = $_GET['immatriculation'];
        $marque = $_GET['marque'];
        $couleur = $_GET['couleur'];
        $voiture1 = new ModelVoiture($marque, $couleur, $immat);
        $voiture1->save();
        ControllerVoiture::readAll();
    }

}

?>
