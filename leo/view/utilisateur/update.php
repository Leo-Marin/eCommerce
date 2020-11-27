<form method="get" action="index.php" controller="utilisateur">
    <fieldset>

        <legend>Infos client :</legend>
        <p> 
            <input type ="hidden" name ="controller" value="client" />
        </p>
                <p> 
                    <input type ="hidden" name ="action" value=<?php echo "\"$act\"" ?>/>
                    <label for="nc_id">numClient</label> :
                    <input type="text" <?php echo "value=\"" . htmlspecialchars($numc) . "\"" ?> name="numClient" id="nc_id" <?php echo "$form=\"" . htmlspecialchars($numc) . "\"" ?>/>
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
                    <input type="text" <?php echo "value=\"" . htmlspecialchars($am) . "\"" ?> name="adresseMail" id="am_id" required/>
                </p>
                <p>
                    <input type="submit" value="Envoyer" />
                </p>
        </form>


