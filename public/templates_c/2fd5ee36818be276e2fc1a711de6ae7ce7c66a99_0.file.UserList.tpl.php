<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-17 10:06:55
  from 'C:\xampp\htdocs\library\app\views\templates\UserList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61e531af8ee385_02636283',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2fd5ee36818be276e2fc1a711de6ae7ce7c66a99' => 
    array (
      0 => 'C:\\xampp\\htdocs\\library\\app\\views\\templates\\UserList.tpl',
      1 => 1642410057,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e531af8ee385_02636283 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta charset="utf-8"/>
	<title>Hello World | Amelia framework</title>
</head>

<body>

<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userNew">Dodaj użytkownika</a>

<table id="tab_users" border="1">
    <thead>
    <tr>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Login</th>
        <th>Hasło</th>
        <th>Rola</th>
        <th>Akcje</th>
    </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'u');
$_smarty_tpl->tpl_vars['u']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
$_smarty_tpl->tpl_vars['u']->do_else = false;
?>
        <tr><td><?php echo $_smarty_tpl->tpl_vars['u']->value["firstname"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['u']->value["lastname"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['u']->value["login"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['u']->value["password"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['u']->value["role"];?>
</td><td><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userEdit/<?php echo $_smarty_tpl->tpl_vars['u']->value['id'];?>
">Edytuj</a>&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userDelete/<?php echo $_smarty_tpl->tpl_vars['u']->value['id'];?>
">Usuń</a></td></tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>

</body>

</html><?php }
}
