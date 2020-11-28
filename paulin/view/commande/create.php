
<form method="get" action="index.php">
    <fieldset>

        <legend>creation de Commande:</legend>
        <p> 
            <input type ="hidden" name ="controller" value="commande" />
        </p>
        <p>
            <input type='hidden' name='action' value='created'>
            <label for="d_id">date</label> :
            <?php $date=date('d/m/y H:i:s') ?>
            <input type="text" <?php echo "value=\"" . $date . "\"" ?> name="date" id="d_id" required/>
        </p>
        <p>
            <label for="nl_id">Livre</label> :
            <select type="number" placeholder="Ex : 5" name="numLivre" id="nl_id" required>
                <?php
                    foreach ($tab_l as $l)
                        echo '<option value="' . htmlspecialchars($l->getnumLivre()) . '">' . htmlspecialchars($l->getnumLivre()) .'   '. htmlspecialchars($l->getTitre()). '</option>' ;
                ?>
            </select>
        </p>
        <p>
            <label for="ncl_id">numClient</label> :
            <input type="text" placeholder="Ex : 14 " name="numClient" id="ncl_id" required/>
        </p> 

        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset> 
</form>


