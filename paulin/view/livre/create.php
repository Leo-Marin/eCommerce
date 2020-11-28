
<form method="get" action="index.php">
    <fieldset>

        <legend>creation de livre:</legend>
        <p> 
            <input type ="hidden" name ="controller" value="livre" />
        </p>
        <p>
            <input type='hidden' name='action' value='created'>
            <label for="na_id">Auteur</label> :
<!--            <input type="number" placeholder="Ex : 5" name="numAuteur" id="na_id" required/>-->
            <select type="number" placeholder="Ex : 5" name="numAuteur" id="na_id" required>
                <?php
                foreach ($tab_aut as $aut)
                    echo '<option value="' . htmlspecialchars($aut->getNumAuteur()) . '">' . htmlspecialchars($aut->getNumAuteur()) .'   '. htmlspecialchars($aut->getNom()). '</option>' ;
                ?>
            </select>
        </p>
        <p>
            <label for="datep_id">date de publication</label> :
            <input type="text" placeholder="Ex : DD/MM/YYYY" name="datePublication" id="datep_id" required/>
        </p>
        <p>
            <label for="la_id">langue</label> :
            <input type="text" placeholder="Ex : Anglais" name="langue" id="la_id" required/>
        </p>
        <p>
            <label for="t_id">titre</label> :
            <input type="text" placeholder="Ex : Les dix petits nègres" name="titre" id="t_id" required/>
        </p> 
        <p>
            <label for="c_id">categorie</label> :
            <input type="text" placeholder="Ex : Roman" name="categorie" id="c_id" required/>
        </p>
        <p>
            <label for="nbp_id">nombre de pages</label> :
            <input type="text" placeholder="Ex : 450" name="nbPage" id="nbp_id" required/>
        </p>
        <p>
            <label for="ne_id">Editeur</label> :
            <select type="number" placeholder="Ex : 5" name="numEditeur" id="ne_id" required>
                <?php
                foreach ($tab_e as $e)
                    echo '<option value="' . htmlspecialchars($e->getnumEditeur()) . '">' . htmlspecialchars($e->getnumEditeur()) .'   '. htmlspecialchars($e->getNom()). '</option>' ;
                ?>
            </select>
        </p>
        <p>
            <label for="f_id">format</label> :
            <input type="text" placeholder="Ex : Audio" name="format" id="f_id" required/>
        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset> 
</form>


