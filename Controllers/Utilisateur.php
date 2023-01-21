<?php
class Utilisateur
{
    public function accueil()
    {
        $this->render('utilisateur/connexion.html');  
    }

    public function inscription()
    {   
        $this->render('utilisateur/inscription.html');  
    }

    public function deconnexion()
    {
        unset($_SESSION['utilisateur']);
        header("Location: /utilisateur/accueil"); 
    }

    public function creation()
    {
        $user = new UtilisateurModel();
        $user->creerUsager($_POST);
        header("Location: /utilisateur/accueil"); 
    }

    /**
     * Tente l'ouvertur d'une connexion : si réussi, redirige vers  
     * et sinon, réaffiche le formulaire de connexion avec un message d'erreur.
     */
    public function connexion()
    {
        $erreur = false;
        $courriel = $_POST['uti_courriel'];
        $mdp = $_POST['uti_mdp'];
        $model = new UtilisateurModel();

        $utilisateur = $model->getUsager($courriel); 
         if(!$utilisateur || !password_verify($mdp, $utilisateur['uti_mdp'])) {
            $erreur = "Mauvaise combinaison courriel/mot de passe";
         }

         if(!$erreur) {
            $_SESSION['utilisateur'] = $utilisateur;
            header("Location: /bouteille/cellier"); 
        }
        else {
            $this->render('utilisateur/connexion.html', [
                "erreur" => $erreur
            ]);  

        }
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
        echo $twig->render($file_name, $data);
    }
}



?>