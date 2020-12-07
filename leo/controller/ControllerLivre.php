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
        if (Session::is_admin()) {
            $view = 'create';
            $pagetitle = 'Creation livre';
            $controller = 'livre';
            $tab_aut = ModelAuteur::selectAll();
            $tab_e = ModelEditeur::selectAll();
            require File::build_path(array("view", "view.php"));
        } else {
            echo 'dommage petit mail';
        }
    }

    public static function created() {
        if (Session::is_admin()) {
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
            $livre1 = new ModelLivre($_GET['numAuteur'], $_GET['datePublication'], $_GET['langue'], $_GET['titre'], $_GET['categorie'], $_GET['nbPage'], $_GET['numEditeur'], $_GET['format']);
            ModelLivre::save($data);
            $tab_l = ModelLivre::selectAll();
            $controller = ('livre');
            $view = 'created';
            $pagetitle = 'Liste des livres';
            require (File::build_path(array("view", "view.php")));
        } else {
            echo 'dommage petit mail';
        }
    }

    public static function error() {
        $controller = ('livre');
        $view = 'error';
        $pagetitle = 'Erreur';
        require (File::build_path(array("view", "view.php")));
    }

    public static function delete() {
        if (Session::is_admin()) {
            $tab_l = ModelLivre::selectAll();     //appel au modèle pour gerer la BD
            $numl = $_GET["numLivre"];
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
        } else {
            echo 'dommage petit filou;';
        }
    }

    public static function update() {
        if (Session::is_admin()) {
            $act = "updated";
            $form = "readonly";
            $pagetitle = 'Mise à jour infos livre';
            $numl = $_GET["numLivre"];
            $tab_aut = ModelAuteur::selectAll();
            $tab_e = ModelEditeur::selectAll();
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
        } else {
            echo 'dommage petit filou';
        }
    }

    public static function updated() {
        if (Session::is_admin()) {
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
        } else {
            echo 'dommage petit malin';
        }
    }

    public static function ajouterPanier() {
        $panier = unserialize($_COOKIE['panier']);
        //CONFIDITOIN
        array_push($panier, $_GET['nl']);
        $livre = ModelLivre::select($_GET['nl']);
        setcookie('panier', serialize($panier), 8400);
        $_SESSION['prix'] = $_SESSION['prix'] + $livre->getPrix();
        //view de confir or not 
        $view = 'ajouterpanier';
        $pagetitle = 'ajoute panier';
        $controller = 'livre';
        require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
    }

    public static function supprimerPanier() {
        $panier = unserialize($_COOKIE['panier']);
        //CONFIDITOIN
        //avant de retirer le prix le prix retirer doit etre dans une variable et verif si le produit est dans le paneir sinon ca retire ps psk sinoin vroum vroum
        if (in_array($_GET["nl"], $panier)) {
        unset($panier[array_search($_GET['nl'], $panier)]);
        sort($panier);
        $livre = ModelLivre::select($_GET['nl']);
        setcookie('panier', serialize($panier), 8400 * 3600);
        $_SESSION['prix'] = $_SESSION['prix'] - $livre->getPrix();
        //view de confir or not 
    }

}
}

?>
