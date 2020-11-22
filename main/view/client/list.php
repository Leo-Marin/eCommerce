
<?php

foreach ($tab_c as $c)
    echo '<p> Client ' . htmlspecialchars($c->getNom()) . ' numero '. ' <a href="index.php?controller=client&action=read&numClient=' . rawurlencode($c->getnumClient()) . '">' . htmlspecialchars($c->getnumClient()) . '</a> .</p>';

echo '<a href="index.php?action=create&controller=client">Formulaire pour ajouter des Client</a>'
?>

