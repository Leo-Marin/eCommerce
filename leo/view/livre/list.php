<?php

foreach ($tab_l as $l)
    echo '<p> Livre' . $l->getnumLivre() . $l->getnumAuteur() . $l->getdatePublication() . $l->getLangue(). $l->getTitre() . $l->getCategorie(). $l->getnbPage() . $l->getnumEditeur(). $l->getFormat() . '</p>';
?>
