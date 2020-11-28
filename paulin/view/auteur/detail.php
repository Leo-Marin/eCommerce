
<?php
echo "<li> Numéro Auteur : " . htmlspecialchars($aut->getNumAuteur()) . "</li>" .
 "<li> Nom : " . htmlspecialchars($aut->getNom()) . "</li>" .
 "<li>Prenom : " . htmlspecialchars($aut->getPrenom()) . "</li>".
 "<li>Nationalité : " . htmlspecialchars($aut->getNationalite()) . "</li>".
 "<li>Date de naissance : " . htmlspecialchars($aut->getDateNaissance()) . "</li>".
"<br><a href = index.php?action=update&controller=auteur&numAuteur=" . rawurlencode($aut->getNumAuteur()) . "> Mettre à jour auteur </a>" .
"<br><a href = index.php?action=delete&controller=auteur&numAuteur=" . rawurlencode($aut->getNumAuteur()) . "> Supprimer auteur </a>";
?>


