<!DOCTYPE html>
<html>
    
    <body>
        <?php
        echo "<p>la commande de numero " . htmlspecialchars($numco) . " a bien été supprimée. <br>"
                . "Il disparaitra de la liste des commandes dans les prochaines minutes.</p>" ;
        require (File::build_path(array("view", "commande", "list.php")));
        
        ?>
    </body>
</html>
