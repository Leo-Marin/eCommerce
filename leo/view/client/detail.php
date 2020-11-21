
<?php
echo "<li> Numéro Client : " . htmlspecialchars($c->getnumClient()) . "</li>" .
 "<li> Prenom : " . htmlspecialchars($c->getPrenom()) . "</li>" .
 "<li> Nom : " . htmlspecialchars($c->getNom()) . "</li>".
 "<li> Adresse Postale : " . htmlspecialchars($c->getadressePostale()) . "</li>".
 "<li> Adresse Mail : " . htmlspecialchars($c->getadresseMail()) . "</li>".
"<br><a href = index.php?action=update&controller=client&numClient=" . rawurlencode($c->getnumClient()) . "> Mettre à jour client </a>" .
"<br><a href = index.php?action=delete&controller=client&numClient=" . rawurlencode($c->getnumClient()) . "> Supprimer client </a>";

?>
