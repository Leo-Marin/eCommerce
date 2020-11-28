
<form method="get" action="index.php">
    <fieldset>

        <legend>CONNECTION:</legend>
        <p> 
            <input type ="hidden" name ="controller" value="utilisateur" />
        </p>
        <p>
            <input type='hidden' name='action' value='connected'>
            <label for="log_id">login</label> :
            <input type="text" name="login" id="log_id" required/>
        </p>
        <p>
            <label for="mdp_id">mdp</label> :
            <input type="password" name="mdp" id="mdp_id" required/>
        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset> 
</form>