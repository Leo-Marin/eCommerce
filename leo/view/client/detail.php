
<?php
echo "<li> Numéro Client : " . htmlspecialchars($c->getnumClient()) . "</li>" .
 "<li> Prenom : " . htmlspecialchars($c->getPrenom()) . "</li>" .
 "<li> Nom : " . htmlspecialchars($c->getNom()) . "</li>".
 "<li> Adresse Postale : " . htmlspecialchars($c->getadressePostale()) . "</li>".
 "<li> Adresse Mail : " . htmlspecialchars($c->getadresseMail()) . "</li>";

?>
