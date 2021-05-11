
<?php
/*
// inclure dans le projet la classe Smarty
//require_once('smarty/libs/Smarty.class.php');
define('SMARTY_DIR', '/usr/local/lib/php/Smarty/');// a modifier en local
require_once(SMARTY_DIR . 'Smarty.class.php');

// Créer l'objet de manipulation des vues
$smarty = new Smarty();

$smarty->setTemplateDir('/var/www/smarty/templates/');
$smarty->setCompileDir('/var/www/smarty/templates_c/');
$smarty->setConfigDir('/var/www/smarty/configs/');
$smarty->setCacheDir('/var/www/smarty/cache/');

*/

require('/var/www/html/projet/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('/var/www/html/projet/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/templates');

$smarty->setCompileDir('/var/www/html/projet/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/templates_c');

$smarty->setCacheDir('/var/www/html/projet/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/cache');

$smarty->setConfigDir('/var/www/html/projet/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/configs');




$smarty->setTemplateDir('/var/www/html/projet/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/Projet HTML5');



$smarty->display('filtre.tpl');

 

// Lui transmettre des données

$dbServername = 'pgsql:host=localhost;port=5432;dbname=acudb';// serveur locale

//phpinfo();

try 
{
    $dbh = new PDO($dbServername,"postgres-tli","tli",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));// connection serveur

}
catch (PDOException $e) 
{
    echo $e->getCode() . ' ' . $e->getMessage();
}
// requete SQL

$sql = 'SELECT * FROM patho ';
$filtre = array();

$trouver='';
$cpt_info=3;// indique sur quel colonne se trouve l'info qui nous intéresse

// vérification de la validité du mot clef si il trouve qq chose alors le mot_clef est stocké dans $trouver
$isConnected ==1;
if ($isConnected ==1){ // si connecté, accès à la recherche par mot clef : 

    if($_GET['mot_clef'] != 'none'){
        $sql = 'SELECT * FROM keywords WHERE name  IN (:mot_clef)';
        $reponse = $dbh->prepare($sql);// communication serveur
        $reponse->execute(array($_GET['mot_clef']));
        $trouver = $reponse->fetch()[1];
        if ($trouver == ''){
        echo 'mot clef non valide, mot clef par default selectionné ';
        }
    }


    // Construction de la requète SQL 

    // si le mot clef est valide

    if($_GET['caracteristiques'] == 'Def'){
        if($trouver!=''){
            if($_GET['Meridien'] != 'Def'){

                $sql = 'SELECT 
                keywords.*,
                keysympt.*,
                symptome.*,
                symptpatho.*,
                patho.*
            FROM keywords
            JOIN keysympt
                ON keywords.idk = keysympt.idk
            JOIN symptome
                ON keysympt.ids = symptome.ids
            JOIN symptpatho
                ON symptome.ids = symptpatho.ids
            JOIN patho
                ON symptpatho.idp = patho.idp
            WHERE name = :mot_clef AND mer=:meridian';
                

                array_push($filtre, $_GET['mot_clef']);
                array_push($filtre, $_GET['Meridien']);

                $cpt_info = 12;

            }
            else{

                $sql = 'SELECT 
                keywords.*,
                keysympt.*,
                symptome.*,
                symptpatho.*,
                patho.*
            FROM keywords
            JOIN keysympt
                ON keywords.idk = keysympt.idk
            JOIN symptome
                ON keysympt.ids = symptome.ids
            JOIN symptpatho
                ON symptome.ids = symptpatho.ids
            JOIN patho
                ON symptpatho.idp = patho.idp
            WHERE name = :mot_clef';
                

                array_push($filtre, $_GET['mot_clef']);

                $cpt_info = 12;
            }
        }
        else{
            if($_GET['Meridien'] != 'Def'){

                $sql = 'SELECT * FROM patho WHERE mer=:meridian';
                array_push($filtre, $_GET['Meridien']);
                $cpt_info = 3;
            }
            else{
                $sql = 'SELECT * FROM patho ';
                $cpt_info = 3;
            }
        }
    }
    else{
        if($trouver!=''){
            if($_GET['Meridien'] != 'Def'){

                $sql = 'SELECT 
                keywords.*,
                keysympt.*,
                symptpatho.*,
                patho.*
            FROM keywords
            JOIN keysympt
                ON keywords.idk = keysympt.idk
            JOIN symptpatho
                ON keysympt.ids = symptpatho.ids
            JOIN patho
                ON symptpatho.idp = patho.idp
            WHERE "desc" LIKE :caract AND name = :mot_clef AND mer=:meridian';

                array_push($filtre, $_GET['caracteristiques']);
                array_push($filtre, $_GET['mot_clef']);
                array_push($filtre, $_GET['Meridien']);

                $cpt_info = 10;

            }
            else{

                $sql = 'SELECT 
                keywords.*,
                keysympt.*,
                symptpatho.*,
                patho.*
            FROM keywords
            JOIN keysympt
                ON keywords.idk = keysympt.idk
            JOIN symptpatho
                ON keysympt.ids = symptpatho.ids
            JOIN patho
                ON symptpatho.idp = patho.idp
            WHERE "desc" LIKE :caract AND name = :mot_clef';
                
                array_push($filtre, $_GET['caracteristiques']);
                array_push($filtre, $_GET['mot_clef']);

                $cpt_info = 10;
            }
        }
        else{
            if($_GET['Meridien'] != 'Def'){

                $sql = 'SELECT *
                FROM patho
                WHERE "desc" LIKE :caract AND mer=:meridian';
                array_push($filtre, $_GET['caracteristiques']);
                array_push($filtre, $_GET['Meridien']);
                $cpt_info = 3;
            }
            else{
                $sql = 'SELECT *
                FROM patho
                WHERE "desc" LIKE :caract';
                array_push($filtre, $_GET['caracteristiques']);
                $cpt_info = 3;
            }
        }
    }
}


















// requète au serveur SQL

$reponse = $dbh->prepare($sql);// communication serveur
$reponse->execute($filtre);


// Formation du tableau de pathologie

$patho = array();// tableau de pathologie
while ($info = $reponse->fetch())//remplissage du tableau de pathologie
{
 //lecture info via fecth (lit les lignes)
    array_push($patho, $info[$cpt_info]);
    //array_push($patho,$info[$cpt_description]);permetrait avec des amélioration d'afficher la description de la maladie

}


$reponse->closeCursor();// fermeture de la requète bdd

$smarty->assign('patho', $patho);
// Lui demander de générer la vue et de l'afficher
$smarty->display('filtre.tpl');
?>
