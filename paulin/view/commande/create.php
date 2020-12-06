
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
                    if(!empty($_GET['numLivre'])){
                        $livre=ModelLivre::select($_GET['numLivre']);
                        echo '<option value="' . htmlspecialchars($livre->getnumLivre()) . '">' . htmlspecialchars($livre->getnumLivre()) .'   '. htmlspecialchars($livre->getTitre()). '</option>' ;
                    }
                    foreach ($tab_l as $l)
                        echo '<option value="' . htmlspecialchars($l->getnumLivre()) . '">' . htmlspecialchars($l->getnumLivre()) .'   '. htmlspecialchars($l->getTitre()). '</option>' ;
                ?>
            </select>
        </p>
        <p>
            <input type="submit" value="Confimer la commande" />
        </p>
    </fieldset> 
</form>


