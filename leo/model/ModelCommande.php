<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelCommande
 *
 * @author leoledino
 */
require_once File::build_path(array("model", "Model.php"));

class ModelCommande {

    private $numCommande;
    private $date;
    private $numLivre;
    private $numClient;
    protected static $objet = 'commande';
    protected static $primary='numCommande';
    
    public function __construct($d = NULL, $nl = NULL, $ncl = NULL) {
        if (!is_null($d) && !is_null($nl) && !is_null($ncl)) {
            // Si aucun de $m, $c et $i sont nuls,
            // c'est forcement qu'on les a fournis
            // donc on retombe sur le constructeur à 3 arguments
            $this->date = $d;
            $this->numLivre = $nl;
            $this->numClient = $ncl;
        }
    }

    // une methode d'affichage.
    /* public function afficher() {
      return "<li> Marque : " . $this->marque . "</li>" .
      "<li> Couleur : " . $this->couleur . "</li>" .
      "<li> Immatriculation : " . $this->immatriculation . "</li>";
      } */

    public function getnumCommande() {
        return $this->numCommande;
    }

    public function getDate() {
        return $this->date;
    }

    public function getnumLivre() {
        return $this->numLivre;
    }

    public function getnumClient() {
        return $this->numClient;
    }

    public static function getAllCommande() {
        $rep = (Model::$pdo)->query("Select * From commande");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommande');
        $tab_comma = $rep->fetchAll();
        return $tab_comma;
    }

    public static function getAllCommandeByClient() {
        $rep = (Model::$pdo)->query("Select * From commande");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommande');
        $tab_comma = $rep->fetchAll();
        return $tab_comma;
    }

    public static function getAllCommandeByLivre() {
        $rep = (Model::$pdo)->query("Select * From commande");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommande');
        $tab_comma = $rep->fetchAll();
        return $tab_comma;
    }

    public static function getCommandeByNum($numco) {
        $sql = "SELECT * from commande WHERE numCommande=:nom_tag";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "nom_tag" => $numco,
                //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête	 
        $req_prep->execute($values);

        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommande');
        $tab_comma = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_comma))
            return false;
        return $tab_comma[0];
    }

    public function save() {
        try {

            $d = $this->date;
            $nl = $this->numLivre;
            $ncl = $this->numClient;

            $sql = "INSERT INTO commande (numCommande, date, numLivre, numClient  ) VALUES (NULL, :d, :nl, :ncl)";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(

                "d" => $d,
                "nl" => $nl,
                "ncl" => $ncl
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
