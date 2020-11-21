<?php

foreach ($tab_c as $c)
    echo '<p> Client' . $c->getnumClient() . $c->getPrenom(). $c->getNom() . '</p>';
?>
