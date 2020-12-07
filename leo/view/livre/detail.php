
<?php
echo "<li> Numéro Livre : " . htmlspecialchars($l->getnumLivre()) . "</li>" .
 "<li> Titre : " . htmlspecialchars($l->getTitre()) . "</li>" .
 "<li>numéro Auteur : " . htmlspecialchars($l->getnumAuteur()) . "</li>".
 "<li>Categorie : " . htmlspecialchars($l->getCategorie()) . "</li>".
 "<li>Date de Publication : " . htmlspecialchars($l->getdatePublication()) . "</li>".
 "<li> Format : " . htmlspecialchars($l->getFormat()) . "</li>" .
 "<li>Nombre de pages : " . htmlspecialchars($l->getnbPage()) . "</li>".
 "<li>Editeur : " . htmlspecialchars($l->getnumEditeur()) . "</li>";
  if(Session::is_admin()){
      echo "<br><a href = index.php?action=update&controller=livre&numLivre=" . rawurlencode($l->getnumLivre()) . "> Mettre à jour Livre </a>" .
"<br><a href = index.php?action=delete&controller=livre&numLivre=" . rawurlencode($l->getnumLivre()) . "> Supprimer Livre </a>";
  }
  
 if(!empty($_SESSION['login'])){
   echo '<br><a href=index.php?action=ajouter&controller=panier&numLivre=' . rawurlencode($l->getnumLivre()) .'>ajouter au panier</a>';
 }

?>
