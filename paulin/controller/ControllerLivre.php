<?php

require_once File::build_path(["model", "ModelLivre.php"]);

class ControllerLivre {

    public static function readAll() {
        $view = 'list';
        $pagetitle = 'Liste des Livres';
        $controller = 'livre';
        $tab_livre = ModelLivre::getAllLivre();     //appel au modèle pour gerer la BD
        require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
    }

    public static function read() {
        $controller = 'livre';
        $pagetitle = 'livre Caracterisations';
        $numl = $_GET['numLivre'];
        $livre = ModelLivre::getLivreByNumLivre($numl);

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
        $pagetitle = 'Creation livre';
        $controller = 'livre';

        require File::build_path(array("view", "view.php"));
    }

    public static function created() {
        $na = $_GET['numAuteur'];
        $d = $_GET['datePublication'];
        $l = $_GET['langue'];
        $t = $_GET['titre'];
        $c = $_GET['categorie'];
        $nbp = $_GET['nbPage'];
        $ne = $_GET['numEditeur'];
        $f = $_GET['format'];
        $livre1 = new ModelLivre($na, $d, $l, $t, $c, $nbp, $ne, $f);
        $livre1->save();
        ControllerLivre::readAll();
    }

    public static function error() {
        $controller = ('livre');
        $view = 'error';
        $pagetitle = 'Erreur';
        require (File::build_path(array("view", "view.php")));
    }

}

?>
