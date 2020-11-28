
<?php
echo "<li> Numéro Commande : " . htmlspecialchars($co->getnumCommande()) . "</li>" .
 "<li> Date : " . htmlspecialchars($co->getDate()) . "</li>" .
 "<li> Numéro Livre : " . htmlspecialchars($co->getnumLivre()) . "</li>".
 "<li> Numéro Client : " . htmlspecialchars($co->getLogin()) . "</li>".

"<br><a href = index.php?action=update&controller=commande&numCommande=" . rawurlencode($co->getnumCommande()) . "> Mettre à jour Commande </a>" .
"<br><a href = index.php?action=delete&controller=commande&numCommande=" . rawurlencode($co->getnumCommande()) . "> Supprimer Commande </a>";
?>
