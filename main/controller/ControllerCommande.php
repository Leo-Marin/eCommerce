<?php

require_once File::build_path(["model", "ModelCommande.php"]);
require_once File::build_path(["model", "ModelLivre.php"]);

class ControllerCommande {

    public static function readAll() {
        if (Session::is_admin()) {
            $view = 'list';
            $pagetitle = 'Liste des Commandes';
            $controller = 'commande';
            $tab_co = ModelCommande::selectAll();     //appel au modèle pour gerer la BD
            require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
        } else {
            echo 'accès restreint';
            $controller = ('commande');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function read() {
        $controller = 'commande';
        $pagetitle = 'Commande Details';
        $numco = $_GET['numCommande'];
        $co = ModelCommande::select($numco);
        if (Session::is_admin() || Session::is_user($co->getLogin())) {
            $livr = ModelLivre::select($co->getnumLivre());
            if ($numco == null) {
                $view = 'error';
                require File::build_path(array("view", "view.php"));
            } else {
                $view = 'detail';
                require File::build_path(array("view", "view.php"));
            }
        } else {
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function create() {
        $view = 'create';
        $pagetitle = 'Creation Commande';
        $controller = 'commande';
        $tab_l = ModelLivre::selectAll();
        $tab_user = ModelUtilisateur::selectAll();
        require File::build_path(array("view", "view.php"));
    }

    public static function created() {
        $data = array(
            "date" => $_GET["date"],
            "numLivre" => $_GET["numLivre"],
            "login" => $_GET["login"],
        );
        $commande1 = new ModelCommande($_GET['date'], $_GET['numLivre'], $_GET["login"]);
        ModelCommande::save($data);
        $tab_co = ModelCommande::selectAll();
        $controller = ('commande');
        $view = 'created';
        $pagetitle = 'Liste des commandes';
        require (File::build_path(array("view", "view.php")));
    }

    public static function validate() {
        if (isset($_SESSION['login'])) {
            if (isset($_COOKIE["panier"]) && !empty(unserialize($_COOKIE["panier"]))) {
                $panier = unserialize($_COOKIE["panier"]);
                foreach ($panier as $value) {
                    $data = array(
                        "date" => date("Y-m-d H:i:s"),
                        "numLivre" => $value,
                        "login" => $_SESSION["login"],
                    );
                    ModelCommande::save($data);
                }
                $panier = array();
                setcookie("panier", serialize($panier), time() + 3600);
                $_SESSION["prixPanier"] = 0;
                $controller = 'commande';
                $view = 'remerciement';
                $pagetitle = 'Merci beaucoup';
                require File::build_path(array('view', 'view.php'));
            } else {
                $controller = 'commande';
                $view = 'panier';
                $pagetitle = 'Panier';
                require File::build_path(array('view', 'view.php'));
            }
        } else {
            $controller = 'utilisateur';
            $view = 'connect';
            $pagetitle = 'Connectez-vous';
            require File::build_path(array('view', 'view.php'));
        }
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
        } else if (Session::is_admin() || Session::is_user($co->getLogin())) {
            ModelCommande::delete($numco);
            $controller = ('commande');
            $view = 'deleted';
            $pagetitle = 'Suppression de la commande';
            require (File::build_path(array("view", "view.php")));
        } else {
            $pagetitle = 'Commande innexistante';
            $controller = ('commande');
            $view = 'error';
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
        } else if (Session::is_admin()) {
            $controller = 'commande';
            $view = 'update';
            require (File::build_path(array("view", "view.php")));
        } else {
            $pagetitle = 'Commande innexistante';
            $controller = ('commande');
            $view = 'error';
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
        );
        $co = ModelCommande::select($numco);
        if (Session::is_admin()) {
            $co->update($data);
            $controller = "commande";
            $view = 'updated';
            require (File::build_path(array("view", "view.php")));
        } else {
            $pagetitle = 'Commande innexistante';
            $controller = ('commande');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function readHistorique() {
        $view = 'list';
        $pagetitle = 'Historique des Commandes';
        $controller = 'commande';
        $tab_co = ModelCommande::selectByLogin();     //appel au modèle pour gerer la BD
        require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
    }

}

?>
