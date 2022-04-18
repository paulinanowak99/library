<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-23 10:54:48
  from 'C:\xampp\htdocs\library\app\views\userEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61ed25e86101f3_62767651',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '013f9a3f31cfdfebe029f5010f47198725362664' => 
    array (
      0 => 'C:\\xampp\\htdocs\\library\\app\\views\\userEdit.tpl',
      1 => 1642922603,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61ed25e86101f3_62767651 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE HTML>
<html>
<head>
    <title>Biblioteka | Użytkownicy</title>
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
        <h2>Dodaj użytkownika</h2>
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userSave" method="post">
            <div class="row gtr-uniform">
                <div class="col-4-xlarge">
                    <label for="firstname">Imię</label>
                    <input id="firstname" type="text" placeholder="imię" name="firstname" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->firstname;?>
">
                </div>
                <div class="col-4-xlarge">
                    <label for="lastname">Nazwisko</label>
                    <input id="lastname" type="text" placeholder="nazwisko" name="lastname" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->lastname;?>
">
                </div>
                <div class="col-4-xlarge">
                    <label for="login">Login</label>
                    <input id="login" type="text" placeholder="login" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
">
                </div>
                <div class="col-4-xlarge">
                    <label for="password">Hasło</label>
                    <input id="password" type="password" placeholder="hasło" name="password" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->password;?>
">
                </div>
                <div class="col-4-xlarge">
                    <label for="role">Rola</label>
                    <input id="role" type="text" placeholder="rola" name="role" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->role;?>
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
