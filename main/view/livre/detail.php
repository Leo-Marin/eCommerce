
<?php
echo "<li> Numéro Livre : " . htmlspecialchars($l->getnumLivre()) . "</li>" .
 "<li> Titre : " . htmlspecialchars($l->getTitre()) . "</li>" .
 "<li>numéro Auteur : " . htmlspecialchars($l->getnumAuteur()) . "</li>".
 "<li>Categorie : " . htmlspecialchars($l->getCategorie()) . "</li>".
 "<li>Date de Publication : " . htmlspecialchars($l->getdatePublication()) . "</li>".
 "<li> Format : " . htmlspecialchars($l->getFormat()) . "</li>" .
 "<li>Nombre de pages : " . htmlspecialchars($l->getnbPage()) . "</li>".
 "<li>Editeur : " . htmlspecialchars($l->getnumEditeur()) . "</li>".
"<br><a href = index.php?action=create&controller=commande&numLivre=" . rawurlencode($l->getnumLivre()) . "> Commander le Livre </a>" .
"<br><a href = index.php?action=update&controller=livre&numLivre=" . rawurlencode($l->getnumLivre()) . "> Mettre à jour Livre </a>" .
"<br><a href = index.php?action=delete&controller=livre&numLivre=" . rawurlencode($l->getnumLivre()) . "> Supprimer Livre </a>";
?>
