<?php

require_once File::build_path(["model", "ModelEditeur.php"]);

class ControllerLivre {

    public static function readAll() {
        $view = 'list';
        $pagetitle = 'Liste des Livres';
        $controller = 'editeur';
        $tab_edit = ModelEditeur::getAllEditeur();     //appel au modèle pour gerer la BD
        require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
    }

    public static function read() {
        $controller = 'editeur';
        $pagetitle = 'Editeur Caracterisations';
        $numl = $_GET['numEditeur'];
        $livre = ModelEditeur::getEditeurByNum($numl);

        if ($livre == null) {
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        } else {
            $view = 'detail';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function create() {
        $view = 'create';
        $pagetitle = 'Creation d\' Editeur';
        $controller = 'editeur';

        require File::build_path(array("view", "view.php"));
    }

    public static function created() {
        $ne = $_GET['numEditeur'];
        $n = $_GET['nom'];
        $na = $_GET['nationalite'];
        $np = $_GET['nomProprietaire'];

        $edit1 = new ModelEditeur($ne, $n, $na, $np);
        $edit1->save();
        ControllerEditeur::readAll();
    }

}

?>
