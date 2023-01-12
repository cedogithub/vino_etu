<form action="/ajouterBouteilleCellier" method="POST">
    <div>   
        <label for="">Date d'achat</label>
        <input type="datetime-local" name="date_achat" required>
    </div>
    <div>   
        <label for="">garde jusqua</label>
        <input type="text" name="garde_jusqua" required>
    </div>
    <div>  
         <label for="">notes</label>
        <input type="text" name="notes" required>
    </div>
    <div>   
        <label for="">prix</label>
        <input type="number" name="prix" required>
    </div>
    <div>  
         <label for="">Quantité</label>
        <input type="number" name="quantite" required>
    </div>
    <div>  
         <label for="">millesime</label>
        <input type="text" name="millesime" required>
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