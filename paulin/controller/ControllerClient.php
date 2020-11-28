<?php

require_once File::build_path(["model", "ModelClient.php"]);

class ControllerClient {

    public static function readAll() {
        $view = 'list';
        $pagetitle = 'Liste des Clients';
        $controller = 'client';
        $tab_c = ModelClient::selectAll();     //appel au modèle pour gerer la BD
        require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
    }

    public static function read() {
        $controller = 'client';
        $pagetitle = 'Client details';
        $numc = $_GET['numClient'];
        $c = ModelClient::select($numc);

        if ($c == null) {
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        } else {
            $view = 'detail';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function create() {
        $view = 'create';
        $pagetitle = 'Creation Client';
        $controller = 'client';

        require File::build_path(array("view", "view.php"));
    }

    public static function created() {
        $data = array(
            "nom" => $_GET["nom"],
            "prenom" => $_GET["prenom"],
            "adressePostale" => $_GET["adressePostale"],
            "adresseMail" => $_GET["adresseMail"],
        );
        $client1 = new ModelClient($_GET['nom'], $_GET['prenom'], $_GET['adressePostale'], $_GET['adresseMail']);
        ModelClient::save($data);
        $tab_c = ModelClient::selectAll();
        $controller = ('client');
        $view = 'created';
        $pagetitle = 'Liste des clients';
        require (File::build_path(array("view", "view.php")));
    }

    public static function delete() {

        $tab_c = ModelClient::selectAll();     //appel au modèle pour gerer la BD
        $numc = $_GET["numClient"];
        $c = ModelClient::select($numc);
        if ($c == null) {
            $pagetitle = 'Client innexistant';
            $controller = ('client');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            ModelClient::delete($numc);
            $controller = ('client');
            $view = 'deleted';
            $pagetitle = 'Suppression du client';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function update() {
        $act = "updated";
        $form = "readonly";
        $pagetitle = 'Mise à jour infos client';
        $numc = $_GET["numClient"];
        $c = ModelClient::select($numc);
        $nc = $c->getnumClient();
        $p = $c->getPrenom();
        $n = $c->getNom();
        $ap = $c->getadressePostale();
        $am = $c->getadresseMail();

        if ($c == null) {
            $controller = ('client');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller = 'client';
            $view = 'update';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function updated() {
        $tab_c = ModelClient::selectAll();
        $pagetitle = 'Client mis à jour';
        $numc = $_GET["numClient"];
        $data = array(
            "nom" => $_GET["nom"],
            "numClient" => $_GET["numClient"],
            "prenom" => $_GET["prenom"],
            "adressePostale" => $_GET["adressePostale"],
            "adresseMail" => $_GET["adresseMail"],
        );
        $c = ModelClient::select($numc);
        $c->update($data);
        $controller = "client";
        $view = 'updated';
        require (File::build_path(array("view", "view.php")));
    }

}

?>
