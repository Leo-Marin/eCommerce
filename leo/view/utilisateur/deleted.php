<!DOCTYPE html>
<html>
    
    <body>
        <?php
        echo "<p>le client de numero " . htmlspecialchars($numc) . " a bien été supprimé. <br>"
                . "Il disparaitra de la liste des client dans les prochaines minutes.</p>" ;
        require (File::build_path(array("view", "client", "list.php")));
        
        ?>
    </body>
</html>
