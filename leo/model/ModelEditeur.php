<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelEditeur
 *
 * @author leoledino
 */
require_once File::build_path(array("model", "Model.php"));

class ModelEditeur {

    private $numEditeur;
    private $nom;
    private $nationalite;
    private $nomProprietaire;

     

    public function __construct($ne = NULL, $n = NULL, $na = NULL, $np = NULL) {
        if (!is_null($ne) && !is_null($n) && !is_null($na) && !is_null($np)) {
            // Si aucun de $m, $c et $i sont nuls,
            // c'est forcement qu'on les a fournis
            // donc on retombe sur le constructeur à 3 arguments
            $this->numEditeur = $ne;
            $this->nom = $n;
            $this->nationalite = $na;
            $this->nomProprietaire = $np;
        }
    }

    // une methode d'affichage.
    /* public function afficher() {
      return "<li> Marque : " . $this->marque . "</li>" .
      "<li> Couleur : " . $this->couleur . "</li>" .
      "<li> Immatriculation : " . $this->immatriculation . "</li>";
      } */

      // LES GETTERS
    
    public function getnumEditeur() {
        return $this->numEditeur;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getNationalie() {
        return $this->nationalite;
    }

    public function getnomProprietaire() {
        return $this->nomProprietaire;
    }

    public function setImmatriculation($imma2) {
        if (strlen($imma2) > 8) {
            echo "Nombre de caractère supérieur à la limite (8).";
        } else {
            $this->immatriculation = $imma2;
        }
    }

    public function setCouleur($couleur2) {
        $this->couleur = $couleur2;
    }

    public static function getAllEditeur() {
        $rep = (Model::$pdo)->query("Select * From Editeur");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelEditeur');
        $tab_edit = $rep->fetchAll();
        return $tab_edit;
    }

    public static function getEditeurByNum($numE) {
        $sql = "SELECT * from editeur WHERE numEditeur=:nom_tag";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "nom_tag" => $numE,
                //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête	 
        $req_prep->execute($values);

        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelEditeur');
        $tab_edit = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_edit))
            return false;
        return $tab_edit[0];
    }

    public function save() {
        try {
            $ne = $this->numEditeur;
            $n = $this->nom;
            $na = $this->nationalite;
            $np = $this->nomProprietaire;

            $sql = "INSERT INTO editeur (numEditeur, nom, nationalite, nomProprietaire  ) VALUES ( :ne, :n, :na, :np)";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "ne" => $ne,
                "n" => $n,
                "na" => $na,
                "np" => $np,
                
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
