<?php
 class Cellier {

    public function cellier(){
        $this->render('cellier/cellier.html');
     
    }
   
    /**
     * L'ajout d'un nouveau cellier 
     *
     * @return void
     */
    public function ajout(){
        $model = new CellierModel();

        $model -> ajoutNouvCellier($_SESSION['uti_id'], $_POST['ajoutCellier']);
    }

    
    /**
     * Supprimer un cellier
     *
     * @return void
     */
    public function supprim($cel_id){
       $model = new CellierModel();

       $model -> supprimerCellier($cel_id);
    }

    public function modif(){
        $model = new CellierModel();

        $model -> modifierCellier($_POST['cel_if'], $_POST['cel_nom']);
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
            'debug' => true,
            'cache' => false
        ]);
        $twig->addGlobal('session', $_SESSION);
        $twig->addExtension(new \Twig\Extension\DebugExtension());
        echo $twig->render($file_name , $data);
    }




 }
?>