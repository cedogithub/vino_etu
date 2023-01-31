<?php


class Admin
{
    

     public function dashboard(){
        $model = new AdminModele();
        $usagers = $model-> getNombreUsagers();
        $celliers = $model-> getNombreUsagers();
        $NbCellier = $model-> getNbParCelliers();
        
        $this->render('admin/dashboard.html', [
            'usagers' => $usagers,
            'celliers' => $celliers,
            'NbCellier' =>$NbCellier

        ]);
     }

    /* Affiche la page demandée 
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



