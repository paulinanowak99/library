<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-23 08:25:48
  from 'C:\xampp\htdocs\library\app\views\BookEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61ed02fc067aa8_56860844',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e5c32ef44dca0ebc26212aa7d2d49f374ac37118' => 
    array (
      0 => 'C:\\xampp\\htdocs\\library\\app\\views\\BookEdit.tpl',
      1 => 1642693911,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61ed02fc067aa8_56860844 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE HTML>
<html>
<head>
    <title>Biblioteka | Książki</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
/style/assets/css/main.css" />
    <noscript><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
/style/assets/css/noscript.css" /></noscript>
</head>

<body class="is-preload">
<!-- Wrapper -->
<div id="wrapper" class="fade-in">

    <!-- Header -->
    <header id="header">
        <a href="index.html" class="logo">BIBLIOTEKA</a>
    </header>

    <div id="main">
        <h2>Dodaj książkę</h2>

        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
bookSave" method="post">
            <div class="row gtr-uniform">
                <div class="col-4-xlarge">
                    <label for="author">Autor</label>
                    <input id="author" type="text" placeholder="autor" name="author" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->author;?>
">
                </div>
                <div class="col-4-xlarge">
                    <label for="title">Tytuł</label>
                    <input id="title" type="text" placeholder="tytuł" name="title" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->title;?>
">
                </div>
                <div class="col-12">
                    <ul class="actions">
                        <li><input type="submit" value="Zapisz" class="primary" /></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
bookList" class="button">Powrót</a></li>
                    </ul>
                </div>
                <div class="col-12">
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
                </div>
            </div>
        </form>

        <div class="align-left">
            <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage()) {?>
                <div class="label">
                    <ul>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
                            <ul class="msg <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>error<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>warning<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>info<?php }?>"><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</ul>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                </div>
            <?php }?>
        </div>
    </div>

    <!-- Copyright -->
    <div id="copyright">
        <ul><li>Design: <a href="https://html5up.net">HTML5 UP</a></li></ul>
    </div>

</div>

    <!-- Scripts -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
/style/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
/style/assets/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
/style/assets/js/jquery.scrolly.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
/style/assets/js/browser.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
/style/assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
/style/assets/js/util.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
/style/assets/js/main.js"><?php echo '</script'; ?>
>

</body>

</html><?php }
}
