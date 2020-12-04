
<form method="get" action="index.php">
    <fieldset>
        
        <legend>validation du mail</legend>
        <p> 
            <input type ="hidden" name ="controller" value="utilisateur" />
        </p>
        <p>
            <input type='hidden' name='action' value='validate'>
            <label for="log_id">login</label> :
            <input type="text" name="login" id="log_id" <?php echo "readonly=\"" . htmlspecialchars($_GET["login"]) . "\"" ?>/>
        </p>
        <label for="nonce_id">code</label> :
        <input type="text" name="nonce" id="nonce_id" required/> 
        </p>

        <input type="submit" value="Valider" />
        </p>
    </fieldset> 
</form>


