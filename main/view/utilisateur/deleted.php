<!DOCTYPE html>
<html>
    
    <body>
        <?php
        echo "<p>le utilisateur de login" . htmlspecialchars($log) . " a bien été supprimé. <br>"
                . "Il disparaitra de la liste des utilisateur dans les prochaines minutes.</p>" ;
        if(Session::is_admin()){
        require (File::build_path(array("view", "utilisateur", "list.php")));
        }
        
        ?>
    </body>
</html>
