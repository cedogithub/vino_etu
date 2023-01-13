class Bouteille {

    constructor(el) {
        this.el = el 
        this.id = this.el.dataset.id;
        this.el_btn_ajouter = this.el.querySelector('.btnAjouter');
        this.el_btn_boire = this.el.querySelector('.btnBoire');
        this.el_quantite = this.el.querySelector('[data-js-quantite]');

        this.init();
    }

    init() {
        this.el_btn_ajouter.addEventListener('click', this.ajouterBouteille); 
        this.el_btn_boire.addEventListener('click', this.boireBouteille); 
    }

    ajouterBouteille = () => {
        let requete = new Request("/ajouterQuantiteBouteille", {method: 'POST', body: '{"id": '+this.id+'}'});
        fetch(requete).then( (res) => {
            if(res.ok) return res.json();
            else throw new Error('La réponse nest pas OK');
        })
        .then( (data) => {
            if (data == 1) this.el_quantite.textContent ++;
        }) 
    }

    boireBouteille = () => {
        let requete = new Request("/boireQuantiteBouteille", {method: 'POST', body: '{"id": '+this.id+'}'});
        fetch(requete).then( (res) => {
            if(res.ok) return res.json();
            else throw new Error('La réponse nest pas OK');
        })
        .then( (data) => {
            if (data == 1) this.el_quantite.textContent --;
        });
    }



}