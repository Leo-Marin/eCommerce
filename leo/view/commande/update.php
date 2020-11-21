<!DOCTYPE html>
<html>


    <body>
        <form method="get" action="index.php" controller="commande">
            <fieldset>
                <legend>Infos commande :</legend>
                <p> 
                    <input type ="hidden" name ="action" value=<?php echo "\"$act\"" ?>/>
                    <label for="nco_id">numCommande</label> :
                    <input type="number" <?php echo "value=\"" . htmlspecialchars($numco) . "\"" ?>  name="numCommande" id="nco_id" required/>
                </p>
                <p>
                    <label for="d_id">date</label> :
                    <input type="text" <?php echo "value=\"" . htmlspecialchars($d) . "\"" ?>  name="date" id="d_id" required/>
                </p>
                <p>
                    <label for="nl_id">numLivre</label> :
                    <input type="text" <?php echo "value=\"" . htmlspecialchars($nl) . "\"" ?>  name="numLivre" id="nl_id" required/>
                </p>
                <p>
                    <label for="nc_id">numClient</label> :
                    <input type="text" <?php echo "value=\"" . htmlspecialchars($nc) . "\"" ?>  name="numClient" id="nc_id" required/>
                </p> 

                <p>
                    <input type="submit" value="Envoyer" />
                </p>
        </form>


    </body>
</html>