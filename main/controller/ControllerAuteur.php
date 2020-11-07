<?php

require_once File::build_path(["model", "ModelAuteur.php"]);

class ControllerAuteur {

    public static function readAll() {
        $view = 'listAuteur';
        $pagetitle = 'Liste des auteurs';
        $controller = 'voiture';
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
            $view = 'detailAuteur';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function create() {
        $view = 'createAuteur';
        $pagetitle = 'Creation Auteur';
        $controller = 'voiture';

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
