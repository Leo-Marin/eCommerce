<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelClient
 *
 * @author leoledino
 */
require_once File::build_path(array("model", "Model.php"));

class ModelClient {


    private $prenom;
    private $nom;
    private $adressePostale;
    private $adresseMail;

    public function __construct($p = NULL, $n = NULL, $ap = NULL, $am = NULL) {
        if (!is_null($p) && !is_null($n) && !is_null($ap) && !is_null($am)) {
            // Si aucun de $m, $c et $i sont nuls,
            // c'est forcement qu'on les a fournis
            // donc on retombe sur le constructeur à 3 arguments
            $this->prenom = $p;
            $this->nom = $n;
            $this->adressePostale = $ap;
            $this->adresseMail = $am;
        }
    }

    // une methode d'affichage.
    /* public function afficher() {
      return "<li> Marque : " . $this->marque . "</li>" .
      "<li> Couleur : " . $this->couleur . "</li>" .
      "<li> Immatriculation : " . $this->immatriculation . "</li>";
      } */

    public function getnumClient() {
        return $this->numClient;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getadressePostale() {
        return $this->adressePostale;
    }

    public function getadresseMail() {
        return $this->adresseMail;
    }

    public function setImmatriculation($imma2) {
        if (strlen($imma2) > 8) {
            echo "Nombre de caractère supérieur à la limite (8).";
        } else {
            $this->immatriculation = $imma2;
        }
    }

    public static function getAllClient() {
        $rep = (Model::$pdo)->query("Select * From client");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelClient');
        $tab_cliquos = $rep->fetchAll();
        return $tab_cliquos;
    }

    public static function getClientByNum($numcl) {
        $sql = "SELECT * from client WHERE numClient=:nom_tag";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "nom_tag" => $numcl,
                //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête	 
        $req_prep->execute($values);

        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelClient');
        $tab_clicos = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_clicos))
            return false;
        return $tab_clicos[0];
    }

    public function save() {
        try {

            $p = $this->prenom;
            $n = $this->nom;
            $ap = $this->adressePostale;
            $am = $this->adresseMail;
            $sql = "INSERT INTO client (numClient, prenom, nom, adressePostale, adresseMail) VALUES (NULL, :p, :n, :ap, :am)";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "p" => $p,
                "n" => $n,                
                "ap" => $ap,
                "am" => $am
            );
            $req_prep->execute($values);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

}
