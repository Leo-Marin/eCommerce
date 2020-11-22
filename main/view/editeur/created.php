<!DOCTYPE html>
<html>
    <body>
        <?php
        echo "<p>Le editeur a bien été créé !</p>";
        require (File::build_path(array("view", "editeur", "list.php")));
            
        
        ?>
    </body>
    
    
</html>