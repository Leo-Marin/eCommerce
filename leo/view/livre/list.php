<?php

foreach ($tab_livre as $livre)
    echo '<p> Livre' . $livre->getnumLivre() . $livre->getnumAuteur(). $livre->getTitre() . $livre->getCategorie() . '</p>';
?>
