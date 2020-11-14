<!DOCTYPE html>
<html>


    <body>
        <form method="get" action="index.php" controller="auteur">
            <fieldset>
                <legend>Infos auteur :</legend>
                <p> 
                    <input type ="hidden" name ="action" value=<?php echo "\"$act\"" ?>/>
                    <label for="numaut_id">numAuteur</label> :
                    <input type="text" <?php echo "value=\"" . htmlspecialchars($numaut) . "\"" ?> name="numaut" id="numaut_id" <?php echo "$form=\"" . htmlspecialchars($numaut) . "\"" ?>/>
                </p>
                <p>
                    <label for="n_id">Nom</label> :
                    <input type="text" <?php echo "value=\"" . htmlspecialchars($n) . "\"" ?> name="nom" id="n_id" required/>
                </p>
                <p>
                    <label for="p_id">Prenom</label> :
                    <input type="text" <?php echo "value=\"" . htmlspecialchars($p) . "\"" ?> name="prenom" id="p_id" required/>
                </p>
                <p>
                    <label for="nat_id">Nationalite</label> :
                    <input type="text" <?php echo "value=\"" . htmlspecialchars($nat) . "\"" ?> name="nationalite" id="nat_id" required/>
                </p>
                <p>
                    <label for="d_id">dateNaissance</label> :
                    <input type="text" <?php echo "value=\"" . htmlspecialchars($d) . "\"" ?> name="dateNaissance" id="d_id" required/>
                </p>
                <p>
                    <input type="submit" value="Envoyer" />
                </p>
        </form>


    </body>
</html>