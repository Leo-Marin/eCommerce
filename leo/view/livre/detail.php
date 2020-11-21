
<?php
echo "<li> Numéro Livre : " . htmlspecialchars($l->getnumLivre()) . "</li>" .
 "<li> Titre : " . htmlspecialchars($l->getTitre()) . "</li>" .
 "<li>numéro Auteur : " . htmlspecialchars($l->getnumAuteur()) . "</li>".
 "<li>Categorie : " . htmlspecialchars($l->getCategorie()) . "</li>".
 "<li>Date de Publication : " . htmlspecialchars($l->getdatePublication()) . "</li>";
 "<li> Format : " . htmlspecialchars($l->getFormat()) . "</li>" .
 "<li>Nombre de pages : " . htmlspecialchars($l->getnbPage()) . "</li>".
 "<li>Editeur : " . htmlspecialchars($l->getnumEditeur()) . "</li>";

?>
