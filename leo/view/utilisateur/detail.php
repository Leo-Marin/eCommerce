
<?php
echo "<li> login user  : " . htmlspecialchars($user->getLogin()) . "</li>" .
 "<li> Prenom : " . htmlspecialchars($user->getPrenom()) . "</li>" .
 "<li> Nom : " . htmlspecialchars($user->getNom()) . "</li>".
 "<li> Adresse Postale : " . htmlspecialchars($user->getadressePostale()) . "</li>".
 "<li> Adresse Mail : " . htmlspecialchars($user->getadresseMail()) . "</li>".
"<br><a href = index.php?action=update&controller=utilisateur&login=" . rawurlencode($user->getLogin()) . "> Mettre à jour utilisateur </a>" .
"<br><a href = index.php?action=delete&controller=utilisateur&login=" . rawurlencode($user->getLogin()) . "> Supprimer utilisateur </a>";
"<br><a href = index.php?action=delete&controller=utilisateur&login=" . rawurlencode($user->getLogin()) . "> Deconnexion</a>";

?>
