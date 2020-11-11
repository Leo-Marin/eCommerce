
<?php
echo "<li> Numéro Auteur : " . htmlspecialchars($v->getNumAuteur()) . "</li>" .
 "<li> Nom : " . htmlspecialchars($v->getNom()) . "</li>" .
 "<li>Prenom : " . htmlspecialchars($v->getPrenom()) . "</li>".
 "<li>Nationalité : " . htmlspecialchars($v->getNationalite()) . "</li>".
 "<li>Date de naissance : " . htmlspecialchars($v->getDateNaissance()) . "</li>";
?>


