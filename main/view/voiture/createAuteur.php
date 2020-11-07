
<form method="get" action="index.php">
    <fieldset>

        <legend>Mon formulaire :</legend>
        <p>
            <input type='hidden' name='action' value='created'>
            <label for="nom_id">Nom</label> :
            <input type="text" placeholder="Ex : Shakespeare" name="nom" id="color_id" required/>
        </p>
        <p>
            <label for="pre_id">Prenom</label> :
            <input type="text" placeholder="Ex : William" name="prenom" id="mark_id" required/>
        </p>
        <p>
            <label for="nat_id">Nationalité</label> :
            <input type="text" placeholder="Ex : Angleterre" name="nationalite" id="mark_id" required/>
        </p>
        <p>
            <label for="nai_id">Date Naissance</label> :
            <input type="text" placeholder="Ex : avril 1564" name="dateNaissance" id="mark_id" required/>
        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset> 
</form>


