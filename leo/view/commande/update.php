<form method="get" action="index.php" controller="commande">
    <fieldset>

        <legend>Infos commande:</legend>
        <p> 
            <input type ="hidden" name ="controller" value="commande" />
        </p>
                <p> 
                    <input type ="hidden" name ="action" value=<?php echo "\"$act\"" ?>/>
                    <label for="nco_id">numCommande</label> :
                    <input type="text" <?php echo "value=\"" . htmlspecialchars($numco) . "\"" ?>  name="numCommande" id="nco_id" required <?php echo "$form=\"" . htmlspecialchars($numco) . "\"" ?>/>
                </p>
                <p>
                    <label for="d_id">date</label> :
                    <input type="text" <?php echo "value=\"" . htmlspecialchars($d) . "\"" ?>  name="date" id="d_id" required/>
                </p>
                <p>
                    <label for="nl_id">numLivre</label> :
                    <select type="number" <?php echo "value=\"" . htmlspecialchars($nl) . "\"" ?> placeholder="Ex : 5" name="numLivre" id="nl_id" required>
                    <?php
                    foreach ($tab_l as $l)
                        echo '<option value="' . htmlspecialchars($l->getnumLivre()) . '">' . htmlspecialchars($l->getnumLivre()) .'   '. htmlspecialchars($l->getTitre()). '</option>' ;
                    ?>
                    </select>
                </p>
                <p>
                    <label for="log_id">login</label> :
                    <input type="text" <?php echo "value=\"" . htmlspecialchars($log) . "\"" ?>  name="log_id" id="nc_id" required/>
                </p> 

                <p>
                    <input type="submit" value="Envoyer" />
                </p>
        </form>
