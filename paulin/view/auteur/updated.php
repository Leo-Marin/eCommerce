<!DOCTYPE html>
<html>
    
    <body>
        <?php
        echo "<p>Les modifications apportées sur lauteur de numero " .  htmlspecialchars($numaut) . " ont été enregistrées</p>" ;
        require (File::build_path(array("view", "auteur", "list.php")));
        ?>
    </body>
</html>
