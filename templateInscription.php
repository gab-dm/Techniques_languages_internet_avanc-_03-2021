<?php

 

require('/var/www/html/ProjetWeb/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('/var/www/html/ProjetWeb/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/templates');

$smarty->setCompileDir('/var/www/html/ProjetWeb/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/templates_c');

$smarty->setCacheDir('/var/www/html/ProjetWeb/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/cache');

$smarty->setConfigDir('/var/www/html/ProjetWeb/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/configs');




$smarty->setTemplateDir('/var/www/html/ProjetWeb/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/Projet HTML5');



$smarty->display('page_inscription.tpl');

 

?>

<?php
/* Connexion à une base MySQL avec l'invocation de pilote */

try {
    $dbh = new PDO('pgsql:host=localhost;port=5432;dbname=acudb', 'postgres-tli', 'tli');
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
    die();
}
if(isset($_POST['formu_inscription']))
{
    //echo (!empty($_POST['Nom']));
    //echo (!empty($_POST['Prénom']));
    //echo (!empty($_POST['pass']));
    //echo (!empty($_POST['mot de passe2']));
    //echo (!empty($_POST['mail']));
    if(!empty($_POST['Nom']) AND !empty($_POST['Prénom']) AND !empty($_POST['mail']) )// condition ques tous les champs soient remplis
    {
        $Nom = htmlspecialchars($_POST['Nom']);
        $Prénom = htmlspecialchars($_POST['Prénom']);
        $mdp = htmlspecialchars($_POST['pass']);
        $mdp2 = htmlspecialchars($_POST['pass2']);
        $mail = htmlspecialchars($_POST['mail']);
        //echo $Prénom." " .$Nom. " " . $mdp.$mail.$mdp2;

        $val =$dbh->query('SELECT mail FROM  "membre"');
        $users = $val->fetchALL(PDO::FETCH_OBJ); //on récupere les valeurs des mails des utilisateurs deja dans la bdd
        if($mdp == $mdp2) 
        {
            $test=0;
            foreach($users as $us){ //on vérifie que le mail n'est pas déja utilisé
                if ($us->mail==$mail){
                    $test=1;
                }
            }
            if ($test==1){
                echo '<p align="center"><font color="red" >'."Ce mail existe déjà !!!".'</font></p>';

            }
            else{
                
                
                $insertNouveau = $dbh->prepare('INSERT INTO "membre" (Nom, Prénom, mail, password2) VALUES(?, ?, ?, ?)');
                $insertNouveau->execute(array($Nom, $Prénom, $mail, $mdp));
                echo '<p align="center"><font color="green" >'."Votre compte a bien été créé !".'</font></p>';
                echo '<p align="center"><a onclick href="login2.php" >'."retour à l accueil".'</a></p>';
            }
            
        }
        else
        {
            echo '<p align="center"><font color="red" >'."Les deux mots de passe ne sont pas identiques !!!".'</font></p>';
        }

    }

    #message d'erreur si au moins une ligne n'est pas complétée
    else
    {
        echo '<p align="center"><font color="red" >'."Tous les champs doivent être complétés !!!".'</font></p>'; 
    }
}
    
?>
