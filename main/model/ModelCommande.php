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

class ModelCommande extends Model {

    private $numCommande;
    private $date;
    private $numLivre;
    private $login;
    protected static $object = 'commande';
    protected static $primary = 'numCommande';

    public function __construct($d = NULL, $nl = NULL, $log = NULL) {
        if (!is_null($d) && !is_null($nl) && !is_null($log)) {
            // Si aucun de $m, $c et $i sont nuls,
            // c'est forcement qu'on les a fournis
            // donc on retombe sur le constructeur à 3 arguments
            $this->date = $d;
            $this->numLivre = $nl;
            $this->login = $log;
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

    public function getLogin() {
        return $this->login;
    }

    public static function selectByLogin() {
        $table_name = static::$object;
        $class_name = "Model" . ucfirst($table_name);
        $primary_key = static::$primary;
        $sql = "SELECT * from " . $table_name . " WHERE login =:nom_tag";
// Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "nom_tag" => $_SESSION["login"],
                //nomdutag => valeur, ...
        );
// On donne les valeurs et on exécute la requête	 
        $req_prep->execute($values);

// On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        $tab = $req_prep->fetchAll();
// Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab))
            return false;
        return $tab;
    }

}
