<div class="precision">
<h3>Mon panier :</h3>
<?php
if (!isset($_COOKIE["panier"]) || empty($_COOKIE["panier"])) {
    echo "<p>Il n'y aucun article dans votre panier</p>";
} else {

    foreach (unserialize($_COOKIE["panier"]) as $value) {
        $l = ModelLivre::select($value);
        $tit = $l->getTitre();
        $prix = $l->getPrix();
        $cat = $l->getCategorie();
        $id = rawurlencode($l->getnumLivre());

//echo '<div class = "produit">' . '<a href= "index.php?action=read&idpierre=' . rawurlencode($p->getIdPierre()) .'"><img src="' . $link . '"alt="id1" height=150px width=150px/><br><strong>' . $p->getNom() . " : " . $p->getPrix() . 'euros</strong></a></div>';

        echo '<div class="prod">'
        . '<a class="Plus de details sur le livre" href= "index.php?action=read&numLivre=' . $id . '">' . '<h4><a href= "index.php?action=read&numLivre=' . $id . '"><strong>' . $tit . " : " . $prix . "€</strong></a></h4>" .
        '<a href= "index.php?controller=livre&action=supprimerPanier&numLivre=' . $id . '">Supprimer l\'article du panier</a><br/><br/>'. '</div>';
    }
    
   
    echo '<h4>Prix total : ' . $_SESSION['prixPanier'] . '€</h4>'; 
 
    echo '<h4><a href="index.php?controller=commande&action=validate">Valider la commande</a></h4><br>';
    
}
?>
</div>