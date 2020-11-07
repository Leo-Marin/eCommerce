
<?php

foreach ($tab_v as $v)
    echo '<p> Voiture d\'immmatriculation <a href="https://webinfo.iutmontp.univ-montp2.fr/~marinl/PHP/eCommerce/main/index.php?action=read&immatriculation=' . rawurlencode($v->getImmatriculation()) . '">' . htmlspecialchars($v->getImmatriculation()) . '</a> .</p>';
?>

