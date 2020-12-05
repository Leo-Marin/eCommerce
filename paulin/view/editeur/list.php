<?php

foreach ($tab_e as $e)
    echo '<p> Editeur ' . htmlspecialchars($e->getNom()) . ' numero <a href="index.php?controller=editeur&action=read&numEditeur=' . rawurlencode($e->getnumEditeur()) . '">' . htmlspecialchars($e->getnumEditeur()) . '</a> .</p>';

if(Session::is_admin()){
echo '<a href="index.php?action=create&controller=editeur">Formulaire pour ajouter des Editeurs</a>';
}
?>
