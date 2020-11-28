<!DOCTYPE html>
<html>
    <body>
        <?php
        echo "<p>La commande a bien été créée !</p>";
        require (File::build_path(array("view", "commande", "list.php")));
            
        
        ?>
    </body>
    
    
</html>