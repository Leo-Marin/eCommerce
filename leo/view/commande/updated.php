<!DOCTYPE html>
<html>
    
    <body>
        <?php
        echo "<p>Les modifications apportées sur la commande de numero " .  htmlspecialchars($numco) . " ont été enregistrées</p>" ;
        require (File::build_path(array("view", "commande", "list.php")));
        ?>
    </body>
</html>
