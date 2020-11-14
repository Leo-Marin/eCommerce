<?php

require_once File::build_path(["model", "ModelAuteur.php"]);

class ControllerAuteur {

    public static function readAll() {
        $view = 'list';
        $pagetitle = 'Liste des auteurs';
        $controller = 'auteur';
        $tab_aut = ModelAuteur::getAllAuteurs();     //appel au modèle pour gerer la BD
        require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
    }

    public static function read() {
        $controller = 'auteur';
        $pagetitle = 'Auteur Caracterisations';
        $numaut = $_GET['numAuteur'];
        $aut = ModelAuteur::getAuteurByNum($numaut);

        if ($aut == null) {
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        } else {
            $view = 'detail';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function create() {
        $view = 'create';
        $pagetitle = 'Creation Auteur';
        $controller = 'auteur';

        require File::build_path(array("view", "view.php"));
    }

    public static function created() {
        $nom = $_GET['nom'];
        $prenom = $_GET['prenom'];
        $nationalite = $_GET['nationalite'];
        $dateNaissance = $_GET['dateNaissance'];
        $auteur1 = new ModelAuteur($nom,$prenom,$nationalite,$dateNaissance);
        $auteur1->save();
        ControllerAuteur::readAll();
    }

}

?>
