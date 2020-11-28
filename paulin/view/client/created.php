<!DOCTYPE html>
<html>
    <body>
        <?php
        echo "<p>Le client a bien été créé !</p>";
        require (File::build_path(array("view", "client", "list.php")));
            
        
        ?>
    </body>
    
    
</html>