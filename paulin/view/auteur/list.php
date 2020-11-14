<?php

foreach ($tab_v as $v)
    echo '<p> Auteur numero <a href="https://webinfo.iutmontp.univ-montp2.fr/~marinl/PHP/eCommerce/main/index.php?action=read&numAuteur=' . rawurlencode($v->getNumAuteur()) . '">' . htmlspecialchars($v->getNumAuteur()) . '</a> .</p>';
?>

