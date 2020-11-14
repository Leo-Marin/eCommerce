
<form method="get" action="index.php">
    <fieldset>

        <legend>Creation Auteur :</legend>
        <p> 
            <input type ="hidden" name ="controller" value="auteur" />
        </p>
        <p>
            <input type='hidden' name='action' value='created'>
            <label for="nom_id">Nom</label> :
            <input type="text" placeholder="Ex : Shakespeare" name="nom" id="nom_id" required/>
        </p>
        <p>
            <label for="pre_id">Prenom</label> :
            <input type="text" placeholder="Ex : William" name="prenom" id="pre_id" required/>
        </p>
        <p>
            <label for="nat_id">Nationalité</label> :
            <input type="text" placeholder="Ex : Angleterre" name="nationalite" id="nat_id" required/>
        </p>
        <p>
            <label for="nai_id">Date Naissance</label> :
            <input type="text" placeholder="Ex : MM/YYYY" name="dateNaissance" id="nai_id" required/>
        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset> 
</form>


