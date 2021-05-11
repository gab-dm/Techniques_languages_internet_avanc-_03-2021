<!doctype html>
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
</html>