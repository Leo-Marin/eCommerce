<?php

require_once File::build_path(["model", "ModelEditeur.php"]);

class ControllerEditeur {

    public static function readAll() {
        $view = 'list';
        $pagetitle = 'Liste des Editeur';
        $controller = 'editeur';
        $tab_edit = ModelEditeur::selectAll();     //appel au modèle pour gerer la BD
        require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
    }

    public static function read() {
        $controller = 'editeur';
        $pagetitle = 'Editeur Caracterisations';
        $numedit = $_GET['numEditeur'];
        $editeur = ModelEditeur::select($numedit);

        if ($editeur == null) {
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
        //$ne = $_GET['numEditeur'];
        $n = $_GET['nom'];
        $na = $_GET['nationalite'];
        $np = $_GET['nomProprietaire'];

        $edit1 = new ModelEditeur(/*$ne,*/ $n, $na, $np);
        $edit1->save();
        ControllerEditeur::selectAll();
    }

}

?>
