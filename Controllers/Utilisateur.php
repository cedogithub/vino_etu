<?php
class Utilisateur
{

    public function deconnexion()
    {
        unset($_SESSION['utilisateur']);
        header("Location: /accueil"); 
    }


}



?>