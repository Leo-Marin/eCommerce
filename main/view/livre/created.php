<!DOCTYPE html>
<html>
    <body>
        <?php
        echo "<p>Le livre a bien été créé !</p>";
        require (File::build_path(array("view", "livre", "list.php")));
            
        
        ?>
    </body>
    
    
</html>