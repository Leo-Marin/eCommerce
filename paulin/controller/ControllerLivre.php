<?php

require_once File::build_path(["model", "ModelLivre.php"]);

class ControllerLivre {

    public static function readAll() {
        $view = 'list';
        $pagetitle = 'Liste des Livres';
        $controller = 'livre';
        $tab_l = ModelLivre::selectAll();     //appel au modèle pour gerer la BD
        require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
    }

    public static function read() {
        $controller = 'livre';
        $pagetitle = 'livre Caracterisations';
        $numl = $_GET['numLivre'];
        $l = ModelLivre::select($numl);

        if ($l == null) {
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
        $tab_aut = ModelAuteur::selectAll();
        require File::build_path(array("view", "view.php"));
    }


        public static function created() {
        $data = array(
            "numAuteur" => $_GET["numAuteur"],
            "datePublication" => $_GET["datePublication"],
            "langue" => $_GET["langue"],
            "titre" => $_GET["titre"],
            "categorie" => $_GET["categorie"],
            "nbPage" => $_GET["nbPage"],
            "numEditeur" => $_GET["numEditeur"],
            "format" => $_GET["format"]
            
        );
        $livre1 = new ModelLivre($_GET['numAuteur'],$_GET['datePublication'],$_GET['langue'], $_GET['titre'], $_GET['categorie'], $_GET['nbPage'], $_GET['numEditeur'], $_GET['format']);
        ModelLivre::save($data);
        $tab_l = ModelLivre::selectAll();
        $controller = ('livre');
        $view = 'created';
        $pagetitle = 'Liste des livres';
        require (File::build_path(array("view", "view.php")));
    }

    public static function error() {
        $controller = ('livre');
        $view = 'error';
        $pagetitle = 'Erreur';
        require (File::build_path(array("view", "view.php")));
    }
    public static function delete() {

        $tab_l = ModelLivre::selectAll();     //appel au modèle pour gerer la BD
        $numl= $_GET["numLivre"];
        $l = ModelLivre::select($numl);
        if ($l == null) {
            $pagetitle = 'Livre innexistant';
            $controller = ('livre');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            ModelLivre::delete($numl);
            $controller = ('livre');
            $view = 'deleted';
            $pagetitle = 'Suppression du livre';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function update() {
        $act = "updated";
        $form = "readonly";
        $pagetitle = 'Mise à jour infos livre';
        $numl = $_GET["numLivre"];
        $l = ModelLivre::select($numl);
        $nl = $l->getnumLivre();
        $na = $l->getnumAuteur();
        $d = $l->getdatePublication();
        $la = $l->getLangue();
        $t = $l->getTitre();
        $c = $l->getCategorie();
        $nbp = $l->getnbPage();
        $ne = $l->getnumEditeur();
        $f = $l->getFormat();
        

        if ($l == null) {
            $controller = ('livre');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller = 'livre';
            $view = 'update';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function updated() {
        $tab_l = ModelLivre::selectAll();
        $pagetitle = 'Livre mis à jour';
        $numl = $_GET["numLivre"];
        $data = array(
            "numLivre" => $_GET["numLivre"],
            "numAuteur" => $_GET["numAuteur"],
            "datePublication" => $_GET["datePublication"],
            "langue" => $_GET["langue"],
            "titre" => $_GET["titre"],
            "categorie" => $_GET["categorie"],
            "nbPage" => $_GET["nbPage"],
            "numEditeur" => $_GET["numEditeur"],
            "format" => $_GET["format"]
            
        );
        $l = ModelLivre::select($numl);
        $l->update($data);
        $controller = "livre";
        $view = 'updated';
        require (File::build_path(array("view", "view.php")));
    }


}

?>
