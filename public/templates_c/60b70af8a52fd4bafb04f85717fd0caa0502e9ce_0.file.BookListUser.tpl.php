<?php
/* Smarty version 3.1.34-dev-7, created on 2022-04-21 21:37:32
  from 'C:\xampp\htdocs\library\app\views\BookListUser.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6261b27c00eb61_56783414',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60b70af8a52fd4bafb04f85717fd0caa0502e9ce' => 
    array (
      0 => 'C:\\xampp\\htdocs\\library\\app\\views\\BookListUser.tpl',
      1 => 1650569847,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:TableBookListUser.tpl' => 1,
  ),
),false)) {
function content_6261b27c00eb61_56783414 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE HTML>
<html>
<head>
    <title>Biblioteka | Książki</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
/style/assets/css/main.css" />
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
/js/functions.js"><?php echo '</script'; ?>
>
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
            <li class="active"><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'bookListUser','page'=>1),$_smarty_tpl ) );?>
">Książki</a></li>
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
            <form id="search-form" onsubmit="ajaxPostForm('search-form', '<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
bookListUserPart', 'table'); return false;">
                <legend><b>Wyszukiwanie</b></legend>
                    <input type="text" style="width: 30%; display: inline-block" placeholder="tytuł" name="sf_title" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->title;?>
" />
                    <button type="submit" class="primary small">Filtruj</button>
            </form>
        <!-- <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
availableBooks" class="button primary">Dostępne książki</a> -->
            <div class="table-wrapper" id="table">
                <?php $_smarty_tpl->_subTemplateRender("file:TableBookListUser.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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
>
    function ajaxPostForm(id_form,url,id_to_reload)
    {
        console.log("1");
        var form = document.getElementById(id_form);
        var formData = new FormData(form);
        var xmlHttp = new XMLHttpRequest();
        console.log("2");
        xmlHttp.onreadystatechange = function() {
            if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                document.getElementById(id_to_reload).innerHTML = xmlHttp.responseText;
            }
        }
        xmlHttp.open("POST", url, true);
        xmlHttp.send(formData);
        console.log("3");
    }
<?php echo '</script'; ?>
>
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
