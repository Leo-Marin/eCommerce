
<form method="get" action="index.php">
    <fieldset>

        <legend>creation de Commande:</legend>
        <p> 
            <input type ="hidden" name ="controller" value="commande" />
        </p>
        <p>
            <input type='hidden' name='action' value='created'>
            <label for="d_id">date</label> :
            <input type="text" placeholder="Ex : DD/MM/YYYY" name="date" id="d_id" required/>
        </p>
        <p>
            <label for="nl_id">numLivre</label> :
            <input type="text" placeholder="Ex : 2 " name="numLivre" id="nl_id" required/>
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

