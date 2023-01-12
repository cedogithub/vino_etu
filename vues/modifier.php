<h1>Formulaire modification du cellier</h1>
<form action="/ajouterBouteilleCellier" method="POST">
    <div>   
    <label for="">date d'achat</label>
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
         <label for="">quantite</label>
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
    <input type="submit" disabled=true value='modifier'>
</form>