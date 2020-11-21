<form method="get" action="index.php" controller="auteur">
    <fieldset>

        <legend>Infos auteur :</legend>
        <p> 
            <input type ="hidden" name ="controller" value="auteur" />
        </p>
        <p> 
            <input type ="hidden" name ="action" value=<?php echo "\"$act\""?>/>
            <label for="num_id">Num</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($numaut) . "\"" ?> name="numAuteur" id="num_id" <?php echo "$form=\"" . htmlspecialchars($numaut) . "\"" ?>/>
        </p>
        <p>
            <label for="nom_id">Nom</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($n) . "\""?> name="nom" id="nom_id" required/>
        </p>
        <p>
            <label for="pre_id">Prenom</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($p) . "\""?> name="prenom" id="pre_id" required/>
        </p>
        <p>
            <label for="nat_id">Nationalité</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($nat) . "\""?> name="nationalite" id="nat_id" required/>
        </p>
        <p>
            <label for="nai_id">Date Naissance</label> :
            <input type="text" <?php echo "value=\"" . htmlspecialchars($d) . "\""?> name="dateNaissance" id="nai_id" required/>
        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset> 
</form>

