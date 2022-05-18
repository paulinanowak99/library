<?php
/* Smarty version 3.1.34-dev-7, created on 2022-05-18 18:22:45
  from 'C:\xampp\htdocs\library\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_62851d559b0c37_94700873',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2c823644aabbc9176080474b644e2dd31856f70' => 
    array (
      0 => 'C:\\xampp\\htdocs\\library\\app\\views\\LoginView.tpl',
      1 => 1652890963,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62851d559b0c37_94700873 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE HTML>
<html>
<head>
    <title>Biblioteka | Logowanie</title>
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

    <!-- Intro -->
    <div id="intro">
        <h1>BIBLIOTEKA</h1>
        <ul class="actions">
            <li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li>
        </ul>
    </div>

    <!-- Header -->
    <header id="header">
        <a class="logo">BIBLIOTEKA</a>
    </header>



    <!-- Main -->
    <div id="main">
        <h2>Logowanie</h2>

        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post">
            <div class="row gtr-uniform">
                <div class="col-4-xlarge">
                    <label for="login">Login: </label>
                    <input type="text" name="login" id="login" placeholder="login" />
                </div>
                <div class="col-4-xlarge">
                    <label for="password">Hasło: </label>
                    <input type="password" name="password" id="password" />
                </div>
                <?php if ($_smarty_tpl->tpl_vars['loginFailed']->value > 4) {?>
                <div class="col-6-xlarge">
                    <label for="captcha">Przepisz kod z obrazka</label>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
/captcha.php" alt="CAPTCHA" class="captcha-image">
                    <br>
                    <input type="text" style="margin-top: 5px; width: 170px; height: 30px; border: 1px solid black" id="captcha" name="captcha">
                </div>
                <?php }?>
                <div class="col-8">
                    <ul class="actions">
                        <li><input type="submit" value="Zaloguj" class="primary" /></li>
                        <li><a class="button primary medium" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
registration">Zarejestruj się</a></li>
                    </ul>
                </div>
                <div class="col-4">
                    <ul class="actions">
                        <li><a class="button medium" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
contactForm">Formularz kontaktowy</a></li>
                    </ul>
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
    </footer>

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
