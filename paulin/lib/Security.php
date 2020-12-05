

<?php

class Security {

    private static $seed = 'Xl84MSreG2';

    public static function hacher($texte_en_clair) {
        $texte_a_hache = static::$seed . $texte_en_clair;
        $texte_hache = hash('sha256', $texte_a_hache);
        return $texte_hache;
    }

    public static function generateRandomHex() {
        // Generate a 32 digits hexadecimal number
        $numbytes = 16; // Because 32 digits hexadecimal = 16 bytes
        $bytes = openssl_random_pseudo_bytes($numbytes);
        $hex = bin2hex($bytes);
        return $hex;
    }
}
    /* $mot_passe_en_clair = 'apple';
      $mot_passe_hache = Security::hacher($mot_passe_en_clair);
      echo $mot_passe_hache;
      //affiche '3a7bd3e2360a3d29eea436fcfb7e44c735d117c42d1c1835420b6b9942dd4f1b' */
    ?>

