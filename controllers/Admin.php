<?php

class admin
{

public function admin()
    {  
        $this->render('admin/dashboard.html');
    }
    
    /**
     * Tente l'ouverture d'une connexion : si réussi, redirige vers  
     * et sinon, réaffiche le formulaire de connexion avec un message d'erreur.
     */
    public function connexion()
    {
        $erreur = false;
        $courriel = $_POST['uti_courriel'];
        $mdp = $_POST['uti_mdp'];
        $model = new UtilisateurModel();

        $utilisateur = $model->getUsager($courriel); 
    
        if(!$erreur) {
            if($utilisateur['uti_rol_id'] == '2'){
            header("Location: /admin/dashboard"); 
            exit();
            }
        }
        else {
            $this->render('utilisateur/connexion.html', [
                "erreur" => $erreur
            ]);  
        }
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



