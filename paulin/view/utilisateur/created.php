<!DOCTYPE html>
<html>
    <body>
        <?php
        echo "<p>Le utilisateur a bien été créé !</p>";
        require (File::build_path(array("view", "utilisateur", "list.php")));
            
        
        ?>
    </body>
    
    
</html>