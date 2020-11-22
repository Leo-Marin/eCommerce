<form method="get" action="index.php" controller="editeur">
    <fieldset>

        <legend>Infos auteur :</legend>
        <p> 
            <input type ="hidden" name ="controller" value="editeur" />
        </p>
        <p> 
            <input type ="hidden" name ="action" value=<?php echo "\"$act\"" ?>/>
            <label for="ne_id">numEditeur</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($ne) . "\"" ?> name="numEditeur" id="ne_id" <?php echo "$form=\"" . htmlspecialchars($nume) . "\"" ?>/>
        </p>
        <p>
            <label for="n_id">nom</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($n) . "\"" ?> name="nom" id="n_id" required/>
        </p>
        <p>
            <label for="na_id">nationalite</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($n) . "\"" ?> name="nationalite" id="na_id" required/>
        </p>
        <p>
            <label for="np_id">nomProprietaire</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($np) . "\"" ?> name="nomProprietaire" id="np_id" required/>
        </p> 
        <p>
            <input type="submit" value="Envoyer" />
        </p>
</form>



