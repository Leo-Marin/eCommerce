
<form method="get" action="index.php">
    <fieldset>

        <legend>creation de utilisateur:</legend>
        <p> 
            <input type ="hidden" name ="controller" value="utilisateur" />
        </p>
        <p>
            <input type='hidden' name='action' value='created'>
            <label for="log_id">login</label> :
            <input type="text" placeholder="Ex : momodupont" name="login" id="log_id" required/>
        </p>
        <p>
            <label for="mdp_id">mdp</label> :
            <input type="password" name="mdp" id="mdp_id" required/>
        </p>
        <p>
            <label for="p_id">prenom</label> :
            <input type="text" placeholder="Ex : Mohamed" name="prenom" id="p_id" required/>
        </p>
        <p>
            <label for="n_id">nom</label> :
            <input type="text" placeholder="Ex : Dupont" name="nom" id="n_id" required/>
        </p>
        <p>
            <label for="ap_id">adressePostale</label> :
            <input type="text" placeholder="Ex : 14 Avenue du Paradis" name="adressePostale" id="ap_id" required/>
        </p> 
        <p>
            <label for="am_id">adresseMail</label> :
            <input type="email" placeholder="Ex : ladress.mail@mail.com" name="adresseMail" id="am_id" required/>
        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset> 
</form>


