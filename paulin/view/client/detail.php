
<?php
echo "<li> Numéro Client : " . htmlspecialchars($client->getnumClient()) . "</li>" .
 "<li> Prenom : " . htmlspecialchars($client->getPrenom()) . "</li>" .
 "<li> Nom : " . htmlspecialchars($client->getNom()) . "</li>".
 "<li> Adresse Postale : " . htmlspecialchars($client->getadressePostale()) . "</li>".
 "<li> Adresse Mail : " . htmlspecialchars($client->getadresseMail()) . "</li>";

?>
