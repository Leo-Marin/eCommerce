<?php

foreach ($tab_edit as $edit){
    echo '<p> Editeur' . $edit->getnumEditeur() . ", ".$edit->getNom(). '</p>';
}
echo '<a href="index.php?controller=editeur&action=create">Ajouter un éditeur</a>';
?>
