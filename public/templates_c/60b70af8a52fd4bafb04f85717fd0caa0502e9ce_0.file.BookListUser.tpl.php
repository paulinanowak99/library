<?php
/* Smarty version 3.1.34-dev-7, created on 2022-04-20 22:55:16
  from 'C:\xampp\htdocs\library\app\views\BookListUser.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_62607334203bf9_85789320',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60b70af8a52fd4bafb04f85717fd0caa0502e9ce' => 
    array (
      0 => 'C:\\xampp\\htdocs\\library\\app\\views\\BookListUser.tpl',
      1 => 1650488114,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62607334203bf9_85789320 (Smarty_Internal_Template $_smarty_tpl) {
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

    <!-- Nav -->
    <nav id="nav">
        <ul class="links">
            <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
bookListUser">Książki</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
rentsListUser">Moje wypożyczenia</a></li>
        </ul>
        <ul class="icons">
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout" class="button primary">Wyloguj</a>
        </ul>
    </nav>

    <div id="main">
        <div class="align-left">
        <!-- <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
availableBooks" class="button primary">Dostępne książki</a> -->
            <div class="table-wrapper">
                <table id="tab_users">
                    <thead>
                    <tr>
                        <th>Autor</th>
                        <th>Tytuł</th>
                        <th>Status</th>
                        <th>Akcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['books']->value, 'b');
$_smarty_tpl->tpl_vars['b']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->do_else = false;
?>
                        <tr><td><?php echo $_smarty_tpl->tpl_vars['b']->value["author"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['b']->value["title"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['b']->value["status"];?>
</td><td><?php if ($_smarty_tpl->tpl_vars['b']->value["status"] == "dostępna") {?><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
bookRentUser/<?php echo $_smarty_tpl->tpl_vars['b']->value['id'];?>
" class="button primary small">Wypożycz</a><?php }
if ($_smarty_tpl->tpl_vars['b']->value["status"] == "wypożyczona") {?><a class="button primary small disabled">Wypożycz</a><?php }?></td></tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
            <div align="center">
                <?php if ($_smarty_tpl->tpl_vars['page']->value <= 1) {?>
                    <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'bookListUser','page'=>$_smarty_tpl->tpl_vars['page']->value-1),$_smarty_tpl ) );?>
" class="button small disabled"><</a>
                <?php } else { ?>
                    <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'bookListUser','page'=>$_smarty_tpl->tpl_vars['page']->value-1),$_smarty_tpl ) );?>
" class="button small"><</a>
                <?php }?>
                <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'bookListUser','page'=>$_smarty_tpl->tpl_vars['page']->value),$_smarty_tpl ) );?>
" class="button primary small"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a>

                <?php if ($_smarty_tpl->tpl_vars['oneMorePage']->value) {?>
                    <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'bookListUser','page'=>$_smarty_tpl->tpl_vars['page']->value+1),$_smarty_tpl ) );?>
" class="button small"><?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
</a>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['twoMorePages']->value) {?>
                    <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'bookListUser','page'=>$_smarty_tpl->tpl_vars['page']->value+2),$_smarty_tpl ) );?>
" class="button small"><?php echo $_smarty_tpl->tpl_vars['page']->value+2;?>
</a>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['limit']->value > $_smarty_tpl->tpl_vars['page']->value) {?>
                    <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'bookListUser','page'=>$_smarty_tpl->tpl_vars['page']->value+1),$_smarty_tpl ) );?>
" class="button small">></a>
                <?php } else { ?>
                    <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'bookListUser','page'=>$_smarty_tpl->tpl_vars['page']->value+1),$_smarty_tpl ) );?>
" class="button small disabled">></a>
                <?php }?>


            </div>
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
