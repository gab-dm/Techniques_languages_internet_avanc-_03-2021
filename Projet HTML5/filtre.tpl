<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="./Styles/style.css">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Acupuncture</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

   

</head>
<body>


    <div align="center">
        <form methode="get" action="filtre.php">

            <input type="text" name="mot_clef" value="none"/> <!-- recherche pas mot clef --> 

            <select name="Meridien"> <!-- filtre selon les meridiens--> 
                <option value="Def">Default</option> <!-- valeur pas defaut, qui permet de tout afficher si elle est déléctionnée --> 
                <option value="-QM">Yin Qiao Mai</option>
                <option value="-WM">Yin Wei Mai</option>
                <option value="+QM">Yang Qiao Mai</option>
                <option value="+WM">Yang Wei Mai</option>
                <option value="C">Coeur</option>
                <option value="ChM">Chong Mai</option>
                <option value="Dai">Mai</option>
                <option value="DM">Du Mai</option>
                <option value="E">Estomac</option>
                <option value="F">Foie</option>
                <option value="GI">Gros Intestin</option>
                <option value="IG">Intestin Grêle</option>
                <option value="MC">Protecteur du coeur</option>
                <option value="P">Poumon</option>
                <option value="R">Rein</option>
                <option value="RM">Ren Mai</option>
                <option value="Rte">Pancréas</option>
                <option value="TR">Triple réchauffeur</option>
                <option value="V">Vessie</option>
                <option value="VB">Vésicule Biliaire</option>
            </select>

            <select name="caracteristiques"> <!-- filtre selon les caractériques des pathologies--> 
                <option value="Def">Default</option>
                <option value="%plein%">plein</option>
                <option value="%chaud%">chaud</option>
                <option value="%vide%">vide</option>
                <option value="%froid%">froid</option>
                <option value="%interne%">interne</option>
                <option value="%externe%">externe</option>
            </select>


            <input type="submit" value="Valider"/><!-- bouton de validation du formulaire --> 

        </form>


</body>

<div align="center"> <!-- boucle d'affichage des pathologies --> 
    <ul>    
        {foreach from=$patho item=pathologie}
            <li>{$pathologie}</li>
        {/foreach}
    </ul>
</div>

</html>
