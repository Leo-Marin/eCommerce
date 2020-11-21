<?php

foreach ($tab_l as $l)
    echo '<p> Livre' . $l->getnumLivre() . $l->getnumAuteur(). $l->getTitre() . $l->getCategorie() . '</p>';
?>
