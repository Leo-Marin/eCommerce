<?php

foreach ($tab_aut as $aut)
    echo '<p> Auteur numero <a href="index.php?controller=auteur&action=read&numAuteur=' . rawurlencode($aut->getNumAuteur()) . '">' . htmlspecialchars($aut->getNumAuteur()) . '</a> .</p>';

echo '<a href="index.php?action=create&controller=auteur">Formulaire pour ajouter des Auteurs</a>'
?>

