<?php

foreach ($tab_livre as $livre){
    echo '<p> Livre' . $livre->getnumLivre() . ", " . $livre->getnumAuteur(). ", ". $livre->getTitre(). ", " . $livre->getCategorie() . '</p>';
    echo '<p> plus de détails concernant le livre <a href="index.php?controller=livre&action=read&numLivre=' . rawurlencode($livre->getnumLivre()) . '">' . htmlspecialchars($livre->getnumLivre()) . '</a> .</p>';
}
 echo '<a href="index.php?controller=commande&action=create">Commander un livre</a>';
 echo '<br>';
echo '<a href="index.php?controller=livre&action=create">Ajouter livre</a>';
?>

