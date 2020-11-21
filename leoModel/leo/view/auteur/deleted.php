<!DOCTYPE html>
<html>
    
    <body>
        <?php
        echo "<p>L'auteur de numero " . htmlspecialchars($numaut) . " a bien été supprimé. <br>"
                . "Il disparaitra de la liste des auteurs dans les prochaines minutes.</p>" ;
        require (File::build_path(array("view", "auteur", "list.php")));
        
        ?>
    </body>
</html>
