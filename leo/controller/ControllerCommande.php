<?php

require_once File::build_path(["model", "ModelLivre.php"]);

class ControllerCommande {

    public static function readAll() {
        $view = 'list';
        $pagetitle = 'Liste des Commandes';
        $controller = 'commande';
        $tab_co = ModelCommande::selectAll();     //appel au modèle pour gerer la BD
        require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
    }

    public static function read() {
        $controller = 'commande';
        $pagetitle = 'Commande Details';
        $numco = $_GET['numCommande'];
        $co = ModelCommande::select($numco);

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
//        $nc = $_GET['numCommande'];
        $d = $_GET['date'];
        $nl = $_GET['numLivre'];
        $ncl = $_GET['numClient'];

        $commande1 = new ModelCommande($d, $nl, $ncl);
        $commande1->save();
        ControllerCommande::selectAll();
    }

    public static function delete() {

        $tab_co = ModelCommande::selectAll();     //appel au modèle pour gerer la BD
        $numco = $_GET["numCommande"];
        $co = ModelCommande::select($numco);
        if ($co == null) {
            $pagetitle = 'Commande innexistante';
            $controller = ('commande');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            ModelCommande::delete($numco);
            $controller = ('commande');
            $view = 'deleted';
            $pagetitle = 'Suppression de la commande';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function update() {
        $act = "updated";
        $form = "readonly";
        $pagetitle = 'Mise à jour infos commande';
        $numco = $_GET["numCommande"];
        $co = ModelCommande::select($numco);
        $nc = $co->getnumCommande();
        $d = $co->getDate();
        $nl = $co->getnumLivre();
        $nc = $co->getnumClient();


        if ($co == null) {
            $controller = ('commande');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller = 'commande';
            $view = 'update';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function updated() {
        $tab_co = ModelCommande::selectAll();
        $pagetitle = 'Commande mis à jour';
        $numco = $_GET["numCommande"];
        $data = array(
            "numCommande" => $_GET["numCommande"],
            "date" => $_GET["date"],
            "numLivre" => $_GET["numLivre"],
            "numClient" => $_GET["numClient"],

        );
        $co = ModelCommande::select($numco);
        $co->update($data);
        $controller = "commande";
        $view = 'updated';
        require (File::build_path(array("view", "view.php")));
    }

}

?>
