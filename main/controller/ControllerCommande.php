<?php

require_once File::build_path(["model", "ModelCommande.php"]);

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
        $tab_l = ModelLivre::selectAll();
        require File::build_path(array("view", "view.php"));
    }

    public static function created() {
        $data = array(
            "date" => $_GET["date"],
            "numLivre" => $_GET["numLivre"],
            "login" => $_GET["login"],
        );
        $commande1 = new ModelCommande($_GET['date'], $_GET['numLivre'], $_GET['login']);
        ModelCommande::save($data);
        $tab_co = ModelCommande::selectAll();
        $controller = ('commande');
        $view = 'created';
        $pagetitle = 'Liste des commandes';
        require (File::build_path(array("view", "view.php")));
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
        $tab_l = ModelLivre::selectAll();
        $co = ModelCommande::select($numco);
        $log = $co->getnumCommande();
        $d = $co->getDate();
        $nl = $co->getnumLivre();
        $log = $co->getlogin();


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
            "login" => $_GET["login"],
        );
        $co = ModelCommande::select($numco);
        $co->update($data);
        $controller = "commande";
        $view = 'updated';
        require (File::build_path(array("view", "view.php")));
    }

}

?>
