<!DOCTYPE html>
<html>
    
    <body>
        <?php
        echo "<p>Les modifications apportées sur le editeur de numero " .  htmlspecialchars($nume) . " ont été enregistrées</p>" ;
        require (File::build_path(array("view", "editeur", "list.php")));
        ?>
    </body>
</html>
