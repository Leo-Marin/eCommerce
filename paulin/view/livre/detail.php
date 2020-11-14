
<?php
echo "<li> Numéro Livre : " . htmlspecialchars($livre->getnumLivre()) . "</li>" .
 "<li> Titre : " . htmlspecialchars($livre->getTitre()) . "</li>" .
 "<li>numéro Auteur : " . htmlspecialchars($livre->getnumAuteur()) . "</li>".
 "<li>Categorie : " . htmlspecialchars($livre->getCategorie()) . "</li>".
 "<li>Date de Publication : " . htmlspecialchars($livre->getdatePublication()) . "</li>";
 "<li> Format : " . htmlspecialchars($livre->getFormat()) . "</li>" .
 "<li>Nombre de pages : " . htmlspecialchars($livre->getnbPage()) . "</li>".
 "<li>Editeur : " . htmlspecialchars($livre->getnumEditeur()) . "</li>";

?>
