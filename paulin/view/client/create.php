
<form method="get" action="index.php">
    <fieldset>

        <legend>creation de client:</legend>
        <p> 
            <input type ="hidden" name ="controller" value="client" />
        </p>
        <p>
            <input type='hidden' name='action' value='created'>
            <label for="p_id">prenom</label> :
            <input type="text" placeholder="Ex : Khaled" name="prenom" id="p_id" required/>
        </p>
        <p>
            <label for="n_id">nom</label> :
            <input type="text" placeholder="Ex : ben Laden" name="nom" id="n_id" required/>
        </p>
        <p>
            <label for="ap_id">adressePostale</label> :
            <input type="text" placeholder="Ex : 14 Avenue du Paradis" name="adressePostale" id="ap_id" required/>
        </p> 
        <p>
            <label for="am_id">adresseMail</label> :
            <input type="text" placeholder="Ex : ladress.mail@mail.com" name="adresseMail" id="am_id" required/>
        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset> 
</form>


