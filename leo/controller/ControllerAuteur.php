<?php

require_once File::build_path(["model", "ModelAuteur.php"]);

class ControllerAuteur {

    public static function readAll() {
        $view = 'list';
        $pagetitle = 'Liste des auteurs';
        $controller = 'auteur';
        $tab_v = ModelAuteur::getAllAuteurs();     //appel au modèle pour gerer la BD
        require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
    }

    public static function read() {
        $controller = 'auteur';
        $pagetitle = 'Auteur Caracterisations';
        $num = $_GET['numAuteur'];
        $n = ModelVoiture::getVoitureByImmat($num);

        if ($n == null) {
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
        $numAuteur = $_GET['numAuteur'];
        $nom = $_GET['nom'];
        $prenom = $_GET['prenom'];
        $nationalite = $_GET['nationalite'];
        $dateNaissance = $_GET['dateNaissance'];
        $auteur1 = new ModelAuteur($numAuteur,$nom,$prenom,$nationalite,$dateNaissance);
        $auteur1->save();
        ControllerVoiture::readAll();
    }

}

?>
