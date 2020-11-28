<!DOCTYPE html>
<html>
    
    <body>
        <?php
        echo "<p>Les modifications apportées sur le client de numero " .  htmlspecialchars($numc) . " ont été enregistrées</p>" ;
        require (File::build_path(array("view", "client", "list.php")));
        ?>
    </body>
</html>
