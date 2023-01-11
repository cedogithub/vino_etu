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
        <label for="">date d'achat</label>
    <input type="text" name="date_achat" id="">
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
         <label for="">quantite</label>
    <input type="text" name="quantite" id="">
    </div>
    <div>  
         <label for="">millesime</label>
    <input type="text" name="millesime" id="">
    </div>
    <div>  
         <label for="">choisir bouteille</label>
    <input type="text" name="id_bouteille" id="">
    </div>
    <input type="submit">
    <!-- rendre le choix dynamic avec un select -->

</form>