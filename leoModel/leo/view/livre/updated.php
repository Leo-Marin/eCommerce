<!DOCTYPE html>
<html>
    
    <body>
        <?php
        echo "<p>Les modifications apportées sur le livre de numero " .  htmlspecialchars($nume) . " ont été enregistrées</p>" ;
        require (File::build_path(array("view", "livre", "list.php")));
        ?>
    </body>
</html>
