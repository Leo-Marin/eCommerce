<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelAuteur
 *
 * @author leoledino
 */
require_once File::build_path(array("model","Model.php"));

class ModelAuteur extends Model{


    private $nom;
    private $prenom;
    private $nationalite;
    private $dateNaissance;
    
    protected static $objet = 'auteur';
    protected static $primary='numAuteur';
    // un getter      


    public function __construct($p = NULL, $na = NULL, $da = NULL) {
        if (!is_null($p) && !is_null($na) && !is_null($da)) {
            // Si aucun de $m, $c et $i sont nuls,
            // c'est forcement qu'on les a fournis
            // donc on retombe sur le constructeur à 3 arguments
            // $num = NULL,
            //$this->numAuteur = $num;
            $this->prenom = $p;
            $this->nationalite = $na;
            $this->dateNaissance = $da;
        }
    }

    // une methode d'affichage.
    /*public function afficher() {
        return "<li> Marque : " . $this->marque . "</li>" .
                "<li> Couleur : " . $this->couleur . "</li>" .
                "<li> Immatriculation : " . $this->immatriculation . "</li>";
    }*/

    public function getNumAuteur() {
        return $this->numAuteur;
    }

    public function getNom() {
        return $this->nom;
    }
    
    public function getPrenom() {
        return $this->prenom;
    }
    
    public function getNationalite() {
        return $this->nationalite;
    }
    
    public function getDateNaissance() {
        return $this->dateNaissance;
    }

    public function setNumAuteur($num) {
        if (strlen($num) > 11) {
            echo "Nombre de caractère supérieur à la limite (8).";
        } else {
            $this->numAuteur= $num;
        }
    }

    public function setNom($num) {
        $this->nom= $num;
    }

    public function setPrenom($num) {
        $this->prenom= $num;
    }
    
    public function setNationalite($num) {
        $this->prenom= $num;
    }
    
    public function setDateNaissance($num) {
        $this->nationalite= $num;
    }
    
    public static function getAuteurByNum($num) {
        $sql = "SELECT * from auteur WHERE numAuteur=:nom_tag";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "nom_tag" => $num,
        );
        // On donne les valeurs et on exécute la requête	 
        $req_prep->execute($values);

        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelAuteur');
        $tab_aut = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_aut))
            return false;
        return $tab_aut[0];
    }

    public function save() {
        try {
            $nom = $this->nom;
            $prenom = $this->prenom;
            $nationalite= $this->nationalite;
            $dateNaissance = $this->dateNaissance;

            $sql = "INSERT INTO Auteur ( nom, prenom, nationalite, dateNaissance  ) VALUES (NULL, :pre, :nat, :dat)";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "nom" => $nom,
                "pre" => $prenom,
                "nat" => $nationalite,
                "dat" => $dateNaissance,
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