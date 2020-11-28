<?php

require_once File::build_path(["model", "ModelUtilisateur.php"]);
require_once File::build_path(["lib", "Security.php"]);

class ControllerUtilisateur {

    public static function readAll() {
        $view = 'list';
        $pagetitle = 'Liste des Utilisateur';
        $controller = 'utilisateur';
        $tab_user = ModelUtilisateur::selectAll();     //appel au modèle pour gerer la BD
        require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
    }

    public static function read() {
        $controller = 'utilisateur';
        $pagetitle = 'Utilisateur details';
        $log = $_GET['login'];
        $user = ModelUtilisateur::select($log);

        if ($user == null) {
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        } else {
            $view = 'detail';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function create() {
        $view = 'create';
        $pagetitle = 'Creation Utilisateur';
        $controller = 'utilisateur';

        require File::build_path(array("view", "view.php"));
    }

    public static function created() {
        $data = array(
            "login" => $_GET["login"],
            "mdp" => Security::hacher($_GET['mdp']),
            "nom" => $_GET["nom"],
            "prenom" => $_GET["prenom"],
            "adressePostale" => $_GET["adressePostale"],
            "adresseMail" => $_GET["adresseMail"],
        );
        $user1 = new ModelUtilisateur($_GET['login'], Security::hacher($_GET['mdp']), $_GET['nom'], $_GET['prenom'], $_GET['adressePostale'], $_GET['adresseMail']);
        ModelUtilisateur::save($data);
        $tab_user = ModelUtilisateur::selectAll();
        $controller = ('utilisateur');
        $view = 'created';
        $pagetitle = 'Liste des Utilisateur';
        require (File::build_path(array("view", "view.php")));
    }

    public static function delete() {

        $tab_user = ModelUtilisateur::selectAll();     //appel au modèle pour gerer la BD
        $log = $_GET["login"];
        $user = ModelUtilisateur::select($log);
        if ($user == null) {
            $controller = ('utilisateur');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            ModelUtilisateur::delete($log);
            $controller = ('utilisateur');
            $view = 'deleted';
            $pagetitle = 'Suppression du Utilisateur';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function update() {
        $act = "updated";
        $form = "readonly";
        $pagetitle = 'Mise à jour infos Utilisateur';
        $login = $_GET["login"];
        $user = ModelUtilisateur::select($login);
        $log = $user->getLogin();
        //$mdp = $user->getMdp();
        $p = $user->getPrenom();
        $n = $user->getNom();
        $ap = $user->getadressePostale();
        $am = $user->getadresseMail();

        if ($user == null) {
            $controller = ('utilisateur');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller = 'utilisateur';
            $view = 'update';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function updated() {
        $tab_user = ModelUtilisateur::selectAll();
        $pagetitle = 'utilisateur mis à jour';
        $login = $_GET["login"];
        $data = array(
            "login" => $_GET["login"],
            "mdp" => Security::hacher($_GET['mdp']),
            "nom" => $_GET["nom"],
            "prenom" => $_GET["prenom"],
            "adressePostale" => $_GET["adressePostale"],
            "adresseMail" => $_GET["adresseMail"],
        );
        $user = ModelUtilisateur::select($login);
        $user->update($data);
        $controller = "utilisateur";
        $view = 'updated';
        require (File::build_path(array("view", "view.php")));
    }

    public static function connect() {
        $view = 'connect';
        $pagetitle = 'Creation Utilisateur';
        $controller = 'utilisateur';

        require File::build_path(array("view", "view.php"));
    }

    public static function connected() {
        $_GET["login"];
        $_GET['mdp'];

        $verif = ModelUtilisateur::checkPassword($_GET["login"], Security::hacher($_GET['mdp']));
        if ($verif) {
            $_SESSION['login'] = $_GET["login"];
            setcookie("connectionCookie", $_GET["login"], time() + 3600);
            $user = $user = ModelUtilisateur::select($_GET["login"]);
            $pagetitle = 'utilisateur mis à jour';
            $controller = "utilisateur";
            $view = 'detail';
            require (File::build_path(array("view", "view.php")));
        } else {
            echo "ntm ton compte exsite pas";
        }
    }
        public static function readLaSessions() {
        $controller = 'utilisateur';
        $pagetitle = 'Utilisateur details';
        $log = $_COOKIE["connectionCookie"];
        $user = ModelUtilisateur::select($log);

        if ($user == null) {
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        } else {
            $view = 'detail';
            require File::build_path(array("view", "view.php"));
        }
    }
}

?>
