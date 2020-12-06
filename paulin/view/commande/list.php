
<?php

foreach ($tab_co as $co)
    echo '<p> Commande ' . htmlspecialchars($co->getDate()) . ' numero <a href="index.php?controller=commande&action=read&numCommande=' . rawurlencode($co->getnumCommande()) . '">' . htmlspecialchars($co->getnumCommande()) . '</a> .</p>';

echo '<a href="index.php?action=create&controller=commande">Passer une commande</a>';
?>
