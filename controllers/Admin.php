<?php


class Admin
{
    

     public function dashboard(){
        $model = new AdminModele();
        $nombreUti = $model-> getNombreUsagers();

        $this->render('admin/dashboard.html', [
            'nombreUti' => $nombreUti
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



