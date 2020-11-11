<?php

require_once File::build_path(["model", "ModelLivre.php"]);

class ControllerCommande {

    public static function readAll() {
        $view = 'list';
        $pagetitle = 'Liste des Commandes';
        $controller = 'commande';
        $tab_comma = ModelCommande::getAllCommande();     //appel au modèle pour gerer la BD
        require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
    }

    public static function read() {
        $controller = 'commande';
        $pagetitle = 'Commande Details';
        $numco = $_GET['numCommande'];
        $livre = ModelCommande::getCommandeByNum($numco);

        if ($numco == null) {
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        } else {
            $view = 'detail';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function create() {
        $view = 'create';
        $pagetitle = 'Creation Commande';
        $controller = 'commande';

        require File::build_path(array("view", "view.php"));
    }

    public static function created() {
        $nc = $_GET['numCommande'];
        $d = $_GET['date'];
        $nl = $_GET['numLivre'];
        $ncl = $_GET['numClient'];

        $commande1 = new ModelCommande($nc, $d, $nl, $ncl);
        $commande1->save();
        ControllerCommande::readAll();
    }

}

?>
