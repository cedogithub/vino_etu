<?php
class Bouteille
{
    public function protection()
    {
        if (!isset($_SESSION['utilisateur'])) {
            header('location: /utilisateur/accueil');
            exit();
        } 
    } 

    /**
     * Affiche la page du cellier de l'utilisateur
     *
     * @return void
     */
    public function cellier()
    {
        $bouteilles = (new BouteilleModel())->getBouteillesCellier();

     
        $this->render('bouteille/cellier.html', [
            'bouteilles' => $bouteilles
        ]);
    }

        
    /**
     * Affiche la page d'ajout de bouteille
     *
     * @return void
     */
    public function nouveau()
    {  
        $bouteillesSAQ = (new BouteilleSAQModel())->getListeBouteille();
        $cellierUtilisateur = (new CellierModel())->getCellier($_SESSION['uti_id']);

        $this->render('bouteille/nouveau.html',[
            'bouteillesSAQ' => $bouteillesSAQ,
            'cellierUtilisateur' => $cellierUtilisateur 
        ]);
    }

    public function modification()
    {
        
    }
    
    /**
     * Gère la requête INSERT de bouteille
     *
     * @return void
     */
    public function insertion()
    {
        $bte = new BouteilleModel();
        $cellier = $bte->insertion($_POST);
        header("Location: /bouteille/cellier");
        exit();
    }
    
    /**
     * Affiche la page de modification d'une bouteille
     *
     * @param  mixed $id_bouteille id de la bouteille
     * @return void
     */
    public function modificationBouteille($id_bouteille)
    {
        $bte = new BouteilleCellier();
        $listeBouteille = $bte->getListeBouteille();

        $data = $bte->getUneBouteilleCellier($id_bouteille);
        // Vérification si id existe
        if ( ! $data) {
            header("Location: /accueil");
            exit();
        } else {  
            include("vues/entete.php");
            include("vues/modifier.php");
            include("vues/pied.php");
        }
    }

    
    public function ajouterQuantiteBouteille() {
        $body = json_decode(file_get_contents('php://input'));
        $bte = new BouteilleModel();
		$resultat = $bte->modifierQuantiteBouteilleCellier($body->id, 1);
        echo json_encode($resultat);
    }
   

    public function boireQuantiteBouteille() {
        $body = json_decode(file_get_contents('php://input'));
        $bte = new BouteilleModel();
		$resultat = $bte->modifierQuantiteBouteilleCellier($body->id, -1);
        echo json_encode($resultat);
    }


    public function apiSelect()
    {
        $bte = new Bouteille();
        $body = json_decode(file_get_contents('php://input'));
        $listeBouteille = (new BouteilleSAQModel())->autocomplete($body->nom);
        echo json_encode($listeBouteille);
    }

    /**
     * Affiche la page demandée
     *
     * @param  string $file_name
     * @param  object|object[]
     * @return void
     */
    public function render($file_name, $data = [])
    {
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/template');
        $twig = new \Twig\Environment($loader, [
            'cache' => false
        ]);
        $twig->addGlobal('session', $_SESSION);
        echo $twig->render($file_name , $data);
    }
}
