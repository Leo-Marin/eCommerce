<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    <ul>
        <?php
        if (Session::is_admin()) {
            echo '<li style="display:inline; margin-right:1em; padding: 3px; border:2px black solid"><a href = index.php?action=readAll&controller=utilisateur>Les utilisateur</a></li>';
        } 
        ?>
        <li style="display:inline; margin-right:1em; padding: 3px; border:2px black solid"><a href = index.php?action=readAll&controller=livre>Les Livres</a></li>
        <li style="display:inline; margin-right:1em; padding: 3px; border:2px black solid"><a href = index.php?action=readAll&controller=auteur> Les Auteurs</a></li>
        <li style="display:inline; margin-right:1em; padding: 3px; border:2px black solid"><a href = index.php?action=readAll&controller=editeur> editeurs</a></li>
        <li style="display:inline; margin-right:1em; padding: 3px; border:2px black solid"><a href = index.php?action=readAll&controller=commande>Mon panier</a></li>
        <?php
        if (!empty($_SESSION['login'])) {
            echo '<li style="display:inline; margin-right:1em; padding: 3px; border:2px black solid"><a href = index.php?action=readLaSessions&controller=utilisateur> Mon compte</a></li>
        <li style="display:inline; margin-right:1em; padding: 3px; border:2px black solid"><a href="index.php?action=deconnect&controller=utilisateur">Deconnexion</a></li>';
        } else {
            echo '<li style="display:inline; margin-right:1em; padding: 3px; border:2px black solid"><a href="index.php?action=connect&controller=utilisateur">Connexion</a></li>
        
        <li style="display:inline; margin-right:1em; padding: 3px; border:2px black solid"><a href="index.php?action=create&controller=utilisateur">Inscription</a></li></ul>';
        }
        ?>


    </head>


    <body>
        <?php
        $filepath = File::build_path(array("view", $controller, "$view.php"));
        require $filepath;
        ?>
    </body>


    <footer>
        <p style="border: 1px solid black;text-align:right; padding-right:1em;"> Site de vente de livre </p>
    </footer>
</html>
