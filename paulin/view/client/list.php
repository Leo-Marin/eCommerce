<?php

foreach ($tab_cliquos as $client){
    echo '<p> Client' . $client->getnumClient() . ", ". $client->getPrenom(). ", ". $client->getNom() . '</p>';
}
echo '<a href="index.php?controller=client&action=create">Formulaire inscription</a>'
?>
