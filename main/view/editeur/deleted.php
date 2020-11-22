<!DOCTYPE html>
<html>
    
    <body>
        <?php
        echo "<p>lEditeur de numero " . htmlspecialchars($ne) . " a bien été supprimé. <br>"
                . "Il disparaitra de la liste des editeur dans les prochaines minutes.</p>" ;
        require (File::build_path(array("view", "editeur", "list.php")));
        
        ?>
    </body>
</html>
