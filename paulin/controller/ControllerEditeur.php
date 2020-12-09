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
        $ne = $_GET['numEditeur'];
        $e = ModelEditeur::select($ne);

        if ($e == null) {
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        } else {
            $view = 'detail';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function create() {
        if(Session::is_admin()){
        $view = 'create';
        $pagetitle = 'Creation d\' Editeur';
        $controller = 'editeur';

        require File::build_path(array("view", "view.php"));
        }else{
            $controller = ('editeur');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function created() {
        if(Session::is_admin()){
        $data = array(
            "nom" => $_GET["nom"],
            "nationalite" => $_GET["nationalite"],
            "nomProprietaire" => $_GET["nomProprietaire"],
        );
        $editeur1 = new ModelEditeur($_GET['nom'], $_GET['nationalite'], $_GET['nomProprietaire']);
        ModelEditeur::save($data);
        $tab_e = ModelEditeur::selectAll();
        $controller = ('editeur');
        $view = 'created';
        $pagetitle = 'Liste des editeurs';
        require (File::build_path(array("view", "view.php")));
        } else {
            $controller = ('editeur');
            $view = 'error';
            require (File::build_path(array("view", "view.php"))); 
        }
    }

    public static function error() {
        $controller = ('editeur');
        $view = 'error';
        $pagetitle = 'Erreur';
        require (File::build_path(array("view", "view.php")));
    }

    public static function delete() {
        if(Session::is_admin()){
        $tab_e = ModelEditeur::selectAll();     //appel au modèle pour gerer la BD
        $ne = $_GET["numEditeur"];
        $e = ModelEditeur::select($ne);
        if ($e == null) {
            $pagetitle = 'Editeur innexistant';
            $controller = ('editeur');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            ModelEditeur::delete($ne);
            $controller = ('editeur');
            $view = 'deleted';
            $pagetitle = 'Suppression du editeur';
            require (File::build_path(array("view", "view.php")));
        }
        }else{
            $controller = ('editeur');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function update() {
        if(Session::is_admin()){
        $act = "updated";
        $form = "readonly";
        $pagetitle = 'Mise à jour infos editeur';
        $nume = $_GET["numEditeur"];
        $e = ModelEditeur::select($nume);
        $ne = $e->getnumEditeur();
        $n = $e->getNationalite();
        $np = $e->getnomProprietaire();


        if ($e == null) {
            $controller = ('editeur');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller = 'editeur';
            $view = 'update';
            require (File::build_path(array("view", "view.php")));
        }
        }else{
            $controller = ('editeur');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function updated() {
        if(Session::is_admin()){
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
        }else{
            $controller = ('editeur');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        }
    }
   

}

?>
