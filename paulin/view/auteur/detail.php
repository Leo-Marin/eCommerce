
<?php
echo "<li> Numéro Auteur : " . htmlspecialchars($aut->getNumAuteur()) . "</li>" .
 "<li> Nom : " . htmlspecialchars($aut->getNom()) . "</li>" .
 "<li>Prenom : " . htmlspecialchars($aut->getPrenom()) . "</li>".
 "<li>Nationalité : " . htmlspecialchars($aut->getNationalite()) . "</li>".
 "<li>Date de naissance : " . htmlspecialchars($aut->getDateNaissance()) . "</li>";
?>


