<?php
/* Smarty version 3.1.39, created on 2021-03-15 10:49:56
  from '/var/www/html/projet/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/Projet HTML5/PageConnexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_604f2dc4137909_29547649',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b0532e592a3b94160d6a06abaf1090b22a69622a' => 
    array (
      0 => '/var/www/html/projet/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/Projet HTML5/PageConnexion.tpl',
      1 => 1615801730,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_604f2dc4137909_29547649 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="fr-FR">

    <head>
        <meta charset="UTF-8" />
        <title>Acupuncture-Connexion</title>
        <link rel="stylesheet" href="Projet HTML5/Styles/style.css">
        

    </head>

    <body>
        <header id="top">
            <h1><a>Acupuncture Zen</a></h1>
        </header>

            
            <div align="center">
                <h2> Connexion </h2>
                <br />
                <form method="POST" action="">
                    <table >
                        <tr>
                            <td align="right">
                                <label for "Identifiant">Identifiant :</label>
                            </td>
                            <td >
                                <input name="Identifiant" type="text" placeholder="Votre Identifiant (votre mail)" />
                            </td>
                        </tr>
                       
                            <td align="right">
                                <label for "pass">Mot de passe :</label>
                            </td>
                            <td >
                                <input id="pass" name="pass" type="password" placeholder="Votre mot de passe" minlength required/>
                            </td>
                        </tr>
                        

                    </table>

                    <br />
                    <input type="submit" name="formu_connexion" value="se connecter" />
                    
                    <br /><br /><br />
                                 
                </form>
                <p align="center"><a onclick href="templateInscription.php" >S'inscrire</a></p>
                <p align="center"><a onclick href="filtre.php" >Accéder au site en tant qu'invité</a></p>
            </div>


    </body>
</html><?php }
}
