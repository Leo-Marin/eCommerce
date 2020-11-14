<?php

foreach ($tab_aut as $aut)
    echo '<p> Auteur numero <a href="https://webinfo.iutmontp.univ-montp2.fr/~marinl/PHP/eCommerce/leo/index.php?controller=auteur&action=read&numAuteur=' . rawurlencode($aut->getNumAuteur()) . '">' . htmlspecialchars($aut->getNumAuteur()) . '</a> .</p>';
?>

