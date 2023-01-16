let elBouteilles = document.querySelectorAll('.bouteille');

for (let i = 0; i < elBouteilles.length; i++) {
    new Bouteille(elBouteilles[i]); 
}