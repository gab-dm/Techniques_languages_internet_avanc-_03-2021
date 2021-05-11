
<!doctype html>
<html lang="fr-FR">

    <head>
        <meta charset="UTF-8" />
        <title>Acupuncture-inscription</title>
        <link rel="stylesheet" href="Projet HTML5/Styles/style.css">
        

    </head>

    <body>
        <header id="top">
            <h1><a>Acupuncture Zen</a></h1>
        </header>

            
            <div align="center">
                <h2> Inscription </h2>
                <br />
                <form method="POST" action="">
                    <table >
                        <tr>
                            <td align="right">
                                <label for "Nom">Nom :</label>
                            </td>
                            <td >
                                <input name="Nom" type="text" placeholder="Votre Nom" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for "Prénom">Prénom :</label>
                            </td>
                            <td >
                                <input name="Prénom" type="text" placeholder="Votre Prénom" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for "pass">Mot de passe :</label>
                            </td>
                            <td >
                                <input id="pass" name="pass" type="password" placeholder="Votre mot de passe" minlength required/>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for "pass2">Confirmation du mot de passe :</label>
                            </td>
                            <td >
                                <input id="pass2" name="pass2" type="password" placeholder="Confirmer votre mdp" required />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for "mail">Adresse mail :</label>
                            </td>
                            <td >
                                <input id="mail" name="mail" type="email" placeholder="Votre adresse mail" />
                            </td>
                        </tr>

                    </table>

                    <br />
                    <input type="submit" name="formu_inscription" value="Valider le formulaire" />
                    <br /><br /><br />
                                 
                </form>
            
            </div>


    </body>
</html>