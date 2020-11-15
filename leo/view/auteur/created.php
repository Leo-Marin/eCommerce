<!DOCTYPE html>
<html>
    <body>
        <?php
        echo "<p>L\'auteur a bien été créé !</p>";
        require (File::build_path(array("view", "auteur", "list.php")));
            
        
        ?>
    </body>
    
    
</html>