<?php

foreach ($tab_l as $livre)
    echo '<p> Livre' . $livre->getnumLivre() . $livre->getnumAuteur(). $livre->getTitre() . $livre->getCategorie() . '</p>';
?>
