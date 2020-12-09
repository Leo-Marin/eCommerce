<?php

require_once File::build_path(["model", "ModelUtilisateur.php"]);
require_once File::build_path(["lib", "Security.php"]);
require_once File::build_path(["lib", "Session.php"]);

class ControllerUtilisateur {

    public static function readAll() {
        if (Session::is_admin()) {
            $view = 'list';
            $pagetitle = 'Liste des Utilisateur';
            $controller = 'utilisateur';
            $tab_user = ModelUtilisateur::selectAll();     //appel au modèle pour gerer la BD
            require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
        } else {
            echo 'tu nous aura pas petit malin';
        }
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
            "nonce" => Security::generateRandomHex(),
        );
        //test si un user a pas deja se login
        if (empty(ModelUtilisateur::select($_GET["login"]))) {
            if (filter_var($_GET["adresseMail"], FILTER_VALIDATE_EMAIL)) {
                $user1 = new ModelUtilisateur($_GET['login'], Security::hacher($_GET['mdp']), $_GET['nom'], $_GET['prenom'], $_GET['adressePostale'], $_GET['adresseMail']);
                ModelUtilisateur::save($data);
                $tab_user = ModelUtilisateur::selectAll();
                //$headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
                $mail = '<p>Voici le lien de validation de votre compte sur LePetitMalin: <a href= "https://webinfo.iutmontp.univ-montp2.fr/~marinl/PHP/eCommerce/main/index.php?controller=utilisateur&action=validate&login=' . $user1->getLogin() . '&nonce=' . $data['nonce'] . '">lien</a></p>';
                $send = mail($user1->getadresseMail(), 'validé mail LePetitMalin', $mail/* , $headers */);
                if ($send) {
                    echo 'mail envoyé';
                } else {
                    echo 'po enovyé';
                }
            } else {
                echo "adresse mail invalide";
                self::create();
            }
        } else {
            echo "login deja utilisé";
            self::create();
        }
    }

    public static function delete() {
        $tab_user = ModelUtilisateur::selectAll();     //appel au modèle pour gerer la BD
        $log = $_GET["login"];
        $user = ModelUtilisateur::select($log);
        if ($user != null || Session::is_user($log) || Session::is_admin()) {
            ModelUtilisateur::delete($log);
            if(Session::is_user($log)){
                session_unset();
            }
            $controller = ('utilisateur');
            $view = 'deleted';
            $pagetitle = 'Suppression du Utilisateur';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller = ('utilisateur');
            $view = 'error';
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
        $adm = $user->getAdmin();

        if (!($user == null) && (Session::is_user($login) || Session::is_admin())) {
            $controller = 'utilisateur';
            $view = 'update';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller = ('utilisateur');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function updated() {
        $tab_user = ModelUtilisateur::selectAll();
        $pagetitle = 'utilisateur mis à jour';
        $log = $_GET["login"];
        if (!isset($_GET["admin"])) {
            $variableAdmin = 0;
        } else if (Session::is_admin()) {
            $variableAdmin = 1;
        } else {
            echo "t'as cru t'allais nous avoir petit malin";
            $variableAdmin = 0;
        }
        if ((Session::is_user($log) || Session::is_admin())) {
            $data = array(
                "login" => $_GET["login"],
                //"mdp" => Security::hacher($_GET['mdp']),
                "nom" => $_GET["nom"],
                "prenom" => $_GET["prenom"],
                "adressePostale" => $_GET["adressePostale"],
                "adresseMail" => $_GET["adresseMail"],
                "admin" => $variableAdmin,
            );
            $user = ModelUtilisateur::select($log);
            //ModelUtilisateur::promoAdminModel($log);
            $user->update($data);
            $controller = "utilisateur";
            $view = 'updated';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller = ('utilisateur');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function connect() {
        if (empty($_SESSION['login'])) {
            $view = 'connect';
            $pagetitle = 'Creation Utilisateur';
            $controller = 'utilisateur';

            require File::build_path(array("view", "view.php"));
        } else {
            self::readAll();
        }
    }

    public static function connected() {
        $_POST["login"];
        $_POST['mdp'];

        $user = ModelUtilisateur::select($_POST["login"]);
        $verif = ModelUtilisateur::checkPassword($_POST["login"], Security::hacher($_POST['mdp']));
        if ($verif && $user->getNonce() == null) {
            $_SESSION['login'] = $_POST["login"];
            $_SESSION["admin"] = ModelUtilisateur::isAdmin($_POST["login"]);
//            setcookie("connectionCookie", $_POST["login"], time() + 60);
            $pagetitle = 'utilisateur mis à jour';
            $controller = "utilisateur";
            $view = 'detail';
            require (File::build_path(array("view", "view.php")));
        } else {
            echo "ton login n'existepas ou ton mdp est faux";
            self::connect();
        }
    }

    public static function readLaSessions() {
        $controller = 'utilisateur';
        $pagetitle = 'Utilisateur details';


        if (isset($_SESSION['login'])) {
            $log = $_SESSION['login'];
            $user = ModelUtilisateur::select($log);
            $view = 'detail';
            require File::build_path(array("view", "view.php"));
        } else {
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function deconnect() {
        session_unset();
        $view = 'list';
        $pagetitle = 'Liste des Livres';
        $controller = 'livre';
        $tab_l = ModelLivre::selectAll();     //appel au modèle pour gerer la BD
        require File::build_path(array("view", "view.php"));
    }

    public static function validate() {
        $no = $_GET["nonce"];
        $log = $_GET["login"];
        $user1nonce = ModelUtilisateur::select($log)->getNonce();
        if (ModelUtilisateur::exist($log) && $user1nonce == $no && $user1nonce != null) {
            $user1 = ModelUtilisateur::select($log);
            $user1->nonceMAJ(null);
            $controller = "utilisateur";
            $view = "validate";
            $pagetitle = "Validation compte";
            require File::build_path(array('view', 'view.php'));
        } else {
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        }
    }

}

?>
