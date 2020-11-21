<?php

require_once File::build_path(["model", "ModelEditeur.php"]);

class ControllerEditeur {

    public static function readAll() {
        $view = 'list';
        $pagetitle = 'Liste des Editeur';
        $controller = 'editeur';
        $tab_e = ModelEditeur::selectAll();     //appel au modèle pour gerer la BD
        require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
    }

    public static function read() {
        $controller = 'editeur';
        $pagetitle = 'Editeur Caracterisations';
        $nume = $_GET['numEditeur'];
        $e = ModelEditeur::select($nume);

        if ($e == null) {
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

        $edit1 = new ModelEditeur(/* $ne, */ $n, $na, $np);
        $edit1->save();
        ControllerEditeur::selectAll();
    }

    public static function error() {
        $controller = ('editeur');
        $view = 'error';
        $pagetitle = 'Erreur';
        require (File::build_path(array("view", "view.php")));
    }

    public static function delete() {

        $tab_e = ModelEditeur::selectAll();     //appel au modèle pour gerer la BD
        $nume = $_GET["numEditeur"];
        $e = ModelEditeur::select($nume);
        if ($e == null) {
            $pagetitle = 'Editeur innexistant';
            $controller = ('editeur');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            ModelEditeur::delete($nume);
            $controller = ('editeur');
            $view = 'deleted';
            $pagetitle = 'Suppression du editeur';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function update() {
        $act = "updated";
        $form = "readonly";
        $pagetitle = 'Mise à jour infos editeur';
        $nume = $_GET["numEditeur"];
        $e = ModelEditeur::select($nume);
        $ne = $l->getnumEditeur();
        $n = $l->getNationalie();
        $np = $l->getnomProprietaire();


        if ($e == null) {
            $controller = ('editeur');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller = 'editeur';
            $view = 'update';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function updated() {
        $tab_e = ModelEditeur::selectAll();
        $pagetitle = 'Livre mis à jour';
        $nume = $_GET["numEditeur"];
        $data = array(
            "numEditeur" => $_GET["numEditeur"],
            "nom" => $_GET["nom"],
            "nationalite" => $_GET["nationalite"],
            "nomProprietaire" => $_GET["nomProprietaire"],
        );
        $e = ModelEditeur::select($nume);
        $e->update($data);
        $controller = "editeur";
        $view = 'updated';
        require (File::build_path(array("view", "view.php")));
    }

}

?>
