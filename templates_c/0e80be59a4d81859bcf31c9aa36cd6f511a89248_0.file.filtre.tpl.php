<?php
/* Smarty version 3.1.39, created on 2021-03-15 09:13:47
  from '/var/www/html/projet/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/Projet HTML5/filtre.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_604f173b66e174_83671353',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e80be59a4d81859bcf31c9aa36cd6f511a89248' => 
    array (
      0 => '/var/www/html/projet/cpe-2021-4eti-tli-av_site_accuponcture-cpe-2021-4eti-tli-av-05/Projet HTML5/filtre.tpl',
      1 => 1615796020,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_604f173b66e174_83671353 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="./Styles/style.css">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Acupuncture-inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

   

</head>
<body>


    <div align="center">
        <form methode="get" action="filtre.php">

            <input type="text" name="mot_clef" value="none"/> <!-- name == chose a recupe dans le POST --> 

            <select name="Meridien">
                <option value="Def">Default</option>
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

            <select name="caracteristiques">
                <option value="Def">Default</option>
                <option value="%plein%">plein</option>
                <option value="%chaud%">chaud</option>
                <option value="%vide%">vide</option>
                <option value="%froid%">froid</option>
                <option value="%interne%">interne</option>
                <option value="%externe%">externe</option>
            </select>


            <input type="submit" value="Valider"/>

        </form>


</body>

<div align="center">
    <ul>    
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['patho']->value, 'pathologie');
$_smarty_tpl->tpl_vars['pathologie']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['pathologie']->value) {
$_smarty_tpl->tpl_vars['pathologie']->do_else = false;
?>
            <li><?php echo $_smarty_tpl->tpl_vars['pathologie']->value;?>
</li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
</div>

<?php echo '<script'; ?>
 src ="script/script.js"><?php echo '</script'; ?>
>

<footer id = 'bas'>

</footer>


</html>
<?php }
}
