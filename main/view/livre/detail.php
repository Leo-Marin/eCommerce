
<?php
echo "<li> Numéro Livre : " . htmlspecialchars($l->getnumLivre()) . "</li>" .
 "<li> Titre : " . htmlspecialchars($l->getTitre()) . "</li>" .
 "<li>numéro Auteur : " . htmlspecialchars($l->getnumAuteur()) . "</li>".
 "<li>Categorie : " . htmlspecialchars($l->getCategorie()) . "</li>".
 "<li>Date de Publication : " . htmlspecialchars($l->getdatePublication()) . "</li>".
 "<li> Format : " . htmlspecialchars($l->getFormat()) . "</li>" .
 "<li>Nombre de pages : " . htmlspecialchars($l->getnbPage()) . "</li>".
 "<li>Editeur : " . htmlspecialchars($l->getnumEditeur()) . "</li>".
 "<li>Prix : " . htmlspecialchars($l->getPrix()) . "€</li>";
  if(Session::is_admin()){
      echo "<br><a href = index.php?action=update&controller=livre&numLivre=" . rawurlencode($l->getnumLivre()) . "> Mettre à jour Livre </a>" .
"<br><a href = index.php?action=delete&controller=livre&numLivre=" . rawurlencode($l->getnumLivre()) . "> Supprimer Livre </a>";
  }
  

   echo '<br><a href=index.php?action=ajouterPanier&controller=panier&numLivre=' . $l->getnumLivre() .'>ajouter au panier</a>';
 

?>
