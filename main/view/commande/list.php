
<?php
if($tab_co==null){
    echo 'Vous n\'avez pas encore effectué de commande !';
}
else{
    foreach ($tab_co as $co)
    echo '<p> Commande ' . htmlspecialchars($co->getDate()) . ' numero <a href="index.php?controller=commande&action=read&numCommande=' . rawurlencode($co->getnumCommande()) . '">' . htmlspecialchars($co->getnumCommande()) . '</a> .</p>';
}
if(Session::is_admin()){
    echo '<a href="index.php?action=create&controller=commande">Ajouter une commande</a>';

}
?>
