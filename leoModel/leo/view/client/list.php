<?php

foreach ($tab_cliquos as $client)
    echo '<p> Client' . $client->getnumClient() . $client->getPrenom(). $client->getNom() . '</p>';
?>
