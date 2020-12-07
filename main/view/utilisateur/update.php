<form method="get" action="index.php" controller="utilisateur">
    <fieldset>

        <legend>Infos client :</legend>
        <p> 
            <input type ="hidden" name ="controller" value="utilisateur" />
        </p>
        <p> 
            <input type ="hidden" name ="action" value=<?php echo "\"$act\"" ?>/>
            <label for="nc_id">login</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($login) . "\"" ?> name="login" id="log_id" <?php echo "$form=\"" . htmlspecialchars($login) . "\"" ?>/>
        </p>
        <p>
            <label for="p_id">prenom</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($p) . "\"" ?> name="prenom" id="p_id" required/>
        </p>
        <p>
            <label for="n_id">nom</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($n) . "\"" ?> name="nom" id="n_id" required/>
        </p>
        <p>
            <label for="ap_id">adressePostale</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($ap) . "\"" ?> name="adressePostale" id="ap_id" required/>
        </p> 
        <p>
            <label for="am_id">adresseMail</label> :
            <input type="email" <?php echo "value=\"" . htmlspecialchars($am) . "\"" ?> name="adresseMail" id="am_id" required/>
        </p>
        <?php
        if (Session::is_admin() && !$adm) {
            echo '
        <p>
            <label for="adm_id">admin</label> :
            <input type="checkbox" name="admin" id="adm_id" required/>
        </p>';
        }?>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
</form>


