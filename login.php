<?php

 

require('/var/www/html/ProjetWeb/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('/var/www/html/ProjetWeb/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/templates');

$smarty->setCompileDir('/var/www/html/ProjetWeb/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/templates_c');

$smarty->setCacheDir('/var/www/html/ProjetWeb/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/cache');

$smarty->setConfigDir('/var/www/html/ProjetWeb/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/configs');




$smarty->setTemplateDir('/var/www/html/ProjetWeb/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/Projet HTML5');



$smarty->display('PageConnexion.tpl');

?>

<?php

try {
    $dbh = new PDO('pgsql:host=localhost;port=5432;dbname=acudb', 'postgres-tli', 'tli');
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
    die();
}
if(isset($_POST['formu_connexion']))
{
    
    if(!empty($_POST['pass']) AND !empty($_POST['mail']) )// vérification des champs
    {
        $mdp = htmlspecialchars($_POST['pass']); //on récupère les valeurs du formulaire de PageConnexion
        $mail = htmlspecialchars($_POST['Identifiant']);
        $query = "SELECT * FROM `membres` WHERE username='$username' and password='".hash('sha256', $password)."'";
        $result = mysqli_query($dbh,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if($rows==1){
            $_POST['username'] = $username;
            
            header("Accueil.html");
        }
        else{
          $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
        }
    }
}    
?>