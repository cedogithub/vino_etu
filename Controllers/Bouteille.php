<?php
class Bouteille
{    
    /**
     * Affiche la page d'accueil
     *
     * @return void
     */
    public function cellier()
    {
        $this->render('cellier/cellier.html');
    }
        
    /**
     * Affiche la page d'ajout de bouteille
     *
     * @return void
     */
    public function nouvelleBouteilleCellier()
    {

    }
    
    /**
     * Gère la requête INSERT de bouteille
     *
     * @return void
     */
    public function ajouterBouteilleCellier()
    {
        $bte = new BouteilleCellier();
        $cellier = $bte->ajouterBouteilleCellier($_POST);
        header("Location: /accueil");
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
        } else {  
            include("vues/entete.php");
            include("vues/modifier.php");
            include("vues/pied.php");
        }
    }

    
    public function ajouterQuantiteBouteille() {
        $body = json_decode(file_get_contents('php://input'));
        $bte = new BouteilleCellier();
		$resultat = $bte->modifierQuantiteBouteilleCellier($body->id, 1);
        echo json_encode($resultat);
    }
   

    public function boireQuantiteBouteille() {
        $body = json_decode(file_get_contents('php://input'));
        $bte = new BouteilleCellier();
		$resultat = $bte->modifierQuantiteBouteilleCellier($body->id, -1);
        echo json_encode($resultat);
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
