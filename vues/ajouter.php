<!-- <div class="ajouter">

    <div class="nouvelleBouteille" vertical layout>
        Recherche : <input type="text" name="nom_bouteille">
        <ul class="listeAutoComplete">

        </ul>
            <div >
                <p>Nom : <span data-id="" class="nom_bouteille"></span></p>
                <p>Millesime : <input name="millesime"></p>
                <p>Quantite : <input name="quantite" value="1"></p>
                <p>Date achat : <input name="date_achat"></p>
                <p>Prix : <input name="prix"></p>
                <p>Garde : <input name="garde_jusqua"></p>
                <p>Notes <input name="notes"></p>
            </div>
            <button name="ajouterBouteilleCellier">Ajouter la bouteille (champs tous obligatoires)</button>
        </div>
    </div>
</div><br> -->
<form action="/ajouterBouteilleCellier" method="POST">
    <div>   
        <label for="">Date d'achat</label>
        <input type="datetime-local" name="date_achat" id="">
    </div>
    <div>   
        <label for="">garde jusqua</label>
        <input type="text" name="garde_jusqua" id="">
    </div>
    <div>  
         <label for="">notes</label>
        <input type="text" name="notes" id="">
    </div>
    <div>   
        <label for="">prix</label>
        <input type="text" name="prix" id="">
    </div>
    <div>  
         <label for="">Quantité</label>
        <input type="number" name="quantite" id="">
    </div>
    <div>  
         <label for="">millesime</label>
        <input type="text" name="millesime" id="">
    </div>
    
    <!-- choix des bouteilles avec un select  -->
    <div>  
    <label for="">choisir bouteille</label>
        <select name="id_bouteille" id="">
        <?php foreach ($listeBouteille as $bouteille): ?>
                <option value="<?= $bouteille['id'] ?>"><?= $bouteille['nom'] ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <input type="submit">

</form>