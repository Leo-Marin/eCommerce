
<?php
echo "<li> Numéro Editeur : " . htmlspecialchars($e->getnumEditeur()) . "</li>" .
 "<li> Nom : " . htmlspecialchars($e->getNom()) . "</li>" .
 "<li> Nationalite : " . htmlspecialchars($e->getNationalite()) . "</li>".
 "<li> Nom du Proprietaire : " . htmlspecialchars($e->getnomProprietaire()) . "</li>";


?>
