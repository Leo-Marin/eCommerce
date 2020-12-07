
<?php
echo "<li> Numéro Editeur : " . htmlspecialchars($e->getnumEditeur()) . "</li>" .
 "<li> Nom : " . htmlspecialchars($e->getNom()) . "</li>" .
 "<li> Nationalite : " . htmlspecialchars($e->getNationalite()) . "</li>".
 "<li> Nom du Proprietaire : " . htmlspecialchars($e->getnomProprietaire()) . "</li>";
if(Session::is_admin()){
    echo "<br><a href = index.php?action=update&controller=editeur&numEditeur=" . rawurlencode($e->getnumEditeur()) . "> Mettre à jour Editeur </a>" .
"<br><a href = index.php?action=delete&controller=editeur&numEditeur=" . rawurlencode($e->getnumEditeur()) . "> Supprimer Editeur </a>";
}

?>
