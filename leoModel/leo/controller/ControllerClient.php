<?php

require_once File::build_path(["model", "ModelLivre.php"]);

class ControllerClient {

    public static function readAll() {
        $view = 'list';
        $pagetitle = 'Liste des Clients';
        $controller = 'client';
        $tab_cliquos = ModelClient::getAllClient();     //appel au modèle pour gerer la BD
        require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
    }

    public static function read() {
        $controller = 'client';
        $pagetitle = 'Client details';
        $numcl = $_GET['numClient'];
        $client = ModelClient::select($numl);

        if ($client == null) {
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
        $nc = $_GET['numClient'];
        $p = $_GET['prenom'];
        $n = $_GET['nom'];
        $ap = $_GET['adressePostale'];
        $am = $_GET['adresseMail'];


        $client1 = new ModelClient($nc, $p, $n, $ap, $am);
        $client1->save();
        ControllerClient::selectAll();
    }

}

?>
