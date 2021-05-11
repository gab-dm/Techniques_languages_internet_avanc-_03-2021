<?php

 

require('/var/www/html/projet/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('/var/www/html/projet/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/templates');

$smarty->setCompileDir('/var/www/html/projet/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/templates_c');

$smarty->setCacheDir('/var/www/html/projet/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/cache');

$smarty->setConfigDir('/var/www/html/projet/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/configs');




$smarty->setTemplateDir('/var/www/html/projet/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/Projet HTML5');



$smarty->display('PageConnexion.tpl');

 

?>

<?php
/* Connexion à une base MySQL avec l'invocation de pilote */

try {
    $dbh = new PDO('pgsql:host=localhost;port=5432;dbname=acudb', 'postgres-tli', 'tli');
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
    die();
}
if(isset($_POST['formu_connexion']))
{
    
    if(!empty($_POST['Identifiant']) AND !empty($_POST['pass']) )// condition ques tous les champs soient remplis
    {
        
        $mdp = htmlspecialchars($_POST['pass']);
        
        $identifiant = htmlspecialchars($_POST['Identifiant']);
        

        $val =$dbh->query('SELECT mail, password2 FROM  "membre"');
        $users = $val->fetchALL(PDO::FETCH_OBJ); //on récupere les valeurs des mails des utilisateurs deja dans la bdd
        
        $test=0;
        foreach($users as $us){ //on vérifie que le mail n'est pas déja utilisé
            if ($us->mail==$identifiant){
                if ($us->password2==$mdp)
                {
                    $test=1;
                }
            }
        }
        if ($test==1){
            echo '<p align="center"><font color="red" >'."Identification réussie !!!".'</font></p>';
            echo '<p align="center"><a onclick href="filtre.php" >'."accéder au site ".'</a></p>';

        }
        else{
             
            echo '<p align="center"><font color="green" >'."Mot de passe ou Identifiant incorrect".'</font></p>';
            
        }
    }
    #message d'erreur si au moins une ligne n'est pas complétée
    else
    {
        echo '<p align="center"><font color="red" >'."Tous les champs doivent être complétés !!!".'</font></p>'; 
    }
}
    
?>
