
<?php

foreach ($tab_user as $user)
    echo '<p> utilisateur ' . htmlspecialchars($user->getNom()) . ' numero '. ' <a href="index.php?controller=utilisateur&action=read&login=' . rawurlencode($user->getLogin()) . '">' . htmlspecialchars($user->getLogin()) . '</a> .</p>';

echo '<a href="index.php?action=create&controller=utilisateur">Formulaire pour ajouter des users</a>';

?>

