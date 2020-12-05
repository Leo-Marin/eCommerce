
<?php

foreach ($tab_l as $l){
    echo '<p>  Livre' . htmlspecialchars($l->getTitre()) . ' numero <a href="index.php?controller=livre&action=read&numLivre=' . rawurlencode($l->getnumLivre()) . '">' . htmlspecialchars($l->getnumLivre())  . '</a> .</p>';
}

if(Session::is_admin()){
    echo '<a href="index.php?action=create&controller=livre">Formulaire pour ajouter des Livres</a>';
}
?>