<?php

require_once File::build_path(["model", "ModelAuteur.php"]);

class ControllerAuteur {

    protected static $objet = 'auteur';

    public static function readAll() {
        $view = 'list';
        $pagetitle = 'Liste des auteurs';
        $controller = 'auteur';
        $tab_aut = ModelAuteur::selectAll();     //appel au modèle pour gerer la BD
        require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
    }

    public static function read() {
        $controller = 'auteur';
        $pagetitle = 'Auteur Caracterisations';
        $numaut = $_GET['numAuteur'];
        $aut = ModelAuteur::select($numaut);

        if ($aut == null) {
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
        $pagetitle = 'Creation Auteur';
        $controller = 'auteur';

        require File::build_path(array("view", "view.php"));
        }else{
            echo 'dommage petit mail';
        }
    }


    public static function created() {
        if(Session::is_admin()){
        $data = array(
            "nom" => $_GET["nom"],
            "prenom" => $_GET["prenom"],
            "nationalite" => $_GET["nationalite"],
            "dateNaissance" => $_GET["dateNaissance"]
        );
        $auteur1 = new ModelAuteur($_GET['nom'], $_GET['prenom'], $_GET['nationalite'], $_GET['dateNaissance']);
        ModelAuteur::save($data);
        $tab_aut = ModelAuteur::selectAll();
        $controller = ('auteur');
        $view = 'created';
        $pagetitle = 'Liste des auteurs';
        require (File::build_path(array("view", "view.php")));
        } else {
            echo 'dommage petit malin';
        }
    }

    public static function delete() {

        if(Session::is_admin()){
        $tab_aut = ModelAuteur::selectAll();     //appel au modèle pour gerer la BD
        $numaut = $_GET["numAuteur"];
        $aut = ModelAuteur::select($numaut);
        if ($aut == null) {
            $pagetitle = 'Auteur innexistant';
            $controller = ('auteur');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            ModelAuteur::delete($numaut);
            $controller = ('auteur');
            $view = 'deleted';
            $pagetitle = 'Suppression de l\'auteur';
            require (File::build_path(array("view", "view.php")));
        }
        } else {
            $controller = ('auteur');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function update() {
        if(Session::is_admin()){
        $act = "updated";
        $form = "readonly";
        $pagetitle = 'Mise à jour infos auteur';
        $numaut = $_GET["numAuteur"];
        $aut = ModelAuteur::select($numaut);
        $na = $aut->getNumAuteur();
        $n = $aut->getNom();
        $p = $aut->getPrenom();
        $nat = $aut->getNationalite();
        $d = $aut->getDateNaissance();

        if ($aut == null) {
            $controller = ('auteur');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller = 'auteur';
            $view = 'update';
            require (File::build_path(array("view", "view.php")));
        }
        } else {
            $controller = ('auteur');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function updated() {
        if(Session::is_admin()){
        $tab_aut = ModelAuteur::selectAll();
        $pagetitle = 'Auteur mis à jour';
        $numaut = $_GET["numAuteur"];
        $data = array(
            "numAuteur" => $_GET["numAuteur"],
            "nom" => $_GET["nom"],
            "prenom" => $_GET["prenom"],
            "dateNaissance" => $_GET["dateNaissance"],
            "nationalite" => $_GET["nationalite"],
        );
        $aut = ModelAuteur::select($numaut);
        $aut->update($data);
        $controller = "auteur";
        $view = 'updated';
        require (File::build_path(array("view", "view.php")));
        } else {
            $controller = ('auteur');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        }
    }
    

}

?>
