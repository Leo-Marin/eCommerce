<form method="get" action="index.php" controller="livre">
    <fieldset>

        <legend>Infos livre :</legend>
        <p> 
            <input type ="hidden" name ="controller" value="livre" />
        </p>
        <p> 
            <input type ="hidden" name ="action" value=<?php echo "\"$act\"" ?>/>
            <label for="na_id">numLivre</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($numl) . "\"" ?> name="numLivre" id="nl_id" <?php echo "$form=\"" . htmlspecialchars($numl) . "\"" ?>/>
        </p>
        <p>
            <label for="na_id">numAuteur</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($na) . "\"" ?> name="numAuteur" id="na_id" />
        </p>
        <p>
            <label for="datep_id">datePublication</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($d) . "\"" ?> name="datePublication" id="datep_id" required/>
        </p>
        <p>
            <label for="la_id">langue</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($la) . "\"" ?> name="langue" id="la_id" required/>
        </p>
        <p>
            <label for="t_id">titre</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($t) . "\"" ?> name="titre" id="t_id" required/>
        </p>
        <p>
            <label for="c_id">categorie</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($c) . "\"" ?> name="categorie" id="c_id" required/>
        </p>
        <p>
            <label for="nbp_id">nbPage</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($nbp) . "\"" ?> name="nbPage" id="nbp_id" required/>
        </p>
        <p>
            <label for="ne_id">numEditeur</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($ne) . "\"" ?> name="numEditeur" id="ne_id" required/>
        </p>
        <p>
            <label for="f_id">format</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($f) . "\"" ?> name="format" id="f_id" required/>
        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
</form>
