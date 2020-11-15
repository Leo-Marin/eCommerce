<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelLivre
 *
 * @author leoledino
 */
require_once File::build_path(array("model", "Model.php"));

class ModelLivre {

    private $numLivre;
    private $numAuteur;
    private $datePublication;
    private $langue;
    private $titre;
    private $categorie;
    private $nbPage;
    private $numEditeur;
    private $format;
    protected static $objet = 'livre';
    protected static $primary='numLivre';
    // un getter      
    // un setter 


    public function __construct($na = NULL, $d = NULL, $l = NULL, $t = NULL, $c = NULL, $nbp = NULL, $ne = NULL, $f = NULL) {
        if (!is_null($na) && !is_null($d) && !is_null($l) && !is_null($t) && !is_null($c) && !is_null($nbp && !is_null($ne) && !is_null($f))) {
            // Si aucun de $m, $c et $i sont nuls,
            // c'est forcement qu'on les a fournis
            // donc on retombe sur le constructeur à 3 arguments
            $this->numAuteur = $na;
            $this->datePublication = $d;
            $this->langue = $l;
            $this->titre = $t;
            $this->nbPage = $nbp;
            $this->numEditeur = $ne;
            $this->format = $f;
        }
    }

    // une methode d'affichage.
    /* public function afficher() {
      return "<li> Marque : " . $this->marque . "</li>" .
      "<li> Couleur : " . $this->couleur . "</li>" .
      "<li> Immatriculation : " . $this->immatriculation . "</li>";
      } */
    public function getnumLivre() {
        return $this->numLivre;
    }

    public function getnumAuteur() {
        return $this->numAuteur;
    }

    public function getdatePublication() {
        return $this->datePublication;
    }

    public function getLangue() {
        return $this->langue;
    }

    public function getTitre() {
        return $this->titre;
    }
    
    public function getCategorie() {
        return $this->categorie;
    }
    
    public function getnbPage() {
        return $this->nbPage;
    }

    public function getnumEditeur() {
        return $this->numEditeur;
    }
    
    public function getFormat() {
        return $this->format;
    }



    public static function getAllLivre() {
        $rep = (Model::$pdo)->query("Select * From livre");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelLivre');
        $tab_livre = $rep->fetchAll();
        return $tab_livre;
    }

    public static function getLivreByNumLivre($numl) {
        $sql = "SELECT * from livre WHERE numLivre=:nom_tag";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "nom_tag" => $numl,
                //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête	 
        $req_prep->execute($values);

        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelLivre');
        $tab_livre = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_livre))
            return false;
        return $tab_livre[0];
    }

    public function save() {
        try {
            $na = $this->numAuteur;
            $d = $this->datePublication;
            $l = $this->langue;
            $t = $this->titre;
            $nbp = $this->nbPage;
            $ne = $this->numEditeur;
            $f = $this->format;

            $sql = "INSERT INTO livre (numLivre, numAuteur, datePublication, langue , titre, nbPage, numEditeur, format  ) VALUES ( NULL, :na, :d, :l, :t, :nbp, :ne, :f)";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "na" => $na,
                "d" => $d,
                "l" => $l,
                "t" => $t,
                "nbp" => $nbp,
                "ne" => $ne,
                "f" => $f,
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
