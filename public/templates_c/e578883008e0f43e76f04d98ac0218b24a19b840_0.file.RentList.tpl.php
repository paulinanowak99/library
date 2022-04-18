<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-23 08:26:50
  from 'C:\xampp\htdocs\library\app\views\RentList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61ed033a96e3a5_83946399',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e578883008e0f43e76f04d98ac0218b24a19b840' => 
    array (
      0 => 'C:\\xampp\\htdocs\\library\\app\\views\\RentList.tpl',
      1 => 1642922808,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61ed033a96e3a5_83946399 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE HTML>
<html>
<head>
    <title>Biblioteka | Wypożyczenia</title>
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

    <!-- Nav -->
    <nav id="nav">
        <ul class="links">
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
bookList">Książki</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userList">Zarządzanie użytkownikami</a></li>
            <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
rentList">Wypożyczenia</a></li>
        </ul>
        <ul class="icons">
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout" class="button primary">Wyloguj</a>
        </ul>
    </nav>

    <div id="main">
            <div class="table-wrapper">
                <table id="tab_users">
                    <thead>
                    <tr>
                        <th>Imię czytelnika</th>
                        <th>Nazwisko czytelnika</th>
                        <th>Autor</th>
                        <th>Tytuł</th>
                        <th>Akcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rents']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
                        <tr><td><?php echo $_smarty_tpl->tpl_vars['r']->value["firstname"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["lastname"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["author"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["title"];?>
</td><td><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
rentDelete/<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
" class="button primary small">Zwróć</a></td></tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
<div>
<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage()) {?>
    <div class="messages bottom-margin">
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
