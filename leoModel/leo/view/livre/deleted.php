<!DOCTYPE html>
<html>
    
    <body>
        <?php
        echo "<p>le livre de numero " . htmlspecialchars($numl) . " a bien été supprimé. <br>"
                . "Il disparaitra de la liste des livres dans les prochaines minutes.</p>" ;
        require (File::build_path(array("view", "livre", "list.php")));
        
        ?>
    </body>
</html>
