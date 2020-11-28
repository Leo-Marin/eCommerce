<!DOCTYPE html>
<html>
    
    <body>
        <?php
        echo "<p>Les modifications apportées sur le utilisateur de numero " .  htmlspecialchars($login) . " ont été enregistrées</p>" ;
        require (File::build_path(array("view", "utilisateur", "list.php")));
        ?>
    </body>
</html>
