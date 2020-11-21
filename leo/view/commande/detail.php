
<?php
echo "<li> Numéro Commande : " . htmlspecialchars($co->getnumCommande()) . "</li>" .
 "<li> Date : " . htmlspecialchars($co->getDate()) . "</li>" .
 "<li> Numéro Livre : " . htmlspecialchars($co->getnumLivre()) . "</li>".
 "<li> Numéro Client : " . htmlspecialchars($co->getnumClient()) . "</li>";


?>
