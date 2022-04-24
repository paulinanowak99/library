<!DOCTYPE HTML>
<html>
<head>
    <title>Biblioteka | Książki</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{$conf->action_url}/style/assets/css/main.css" />
    <script type="text/javascript" src="{$conf->action_url}/js/functions.js"></script>
    <noscript><link rel="stylesheet" href="{$conf->action_url}/style/assets/css/noscript.css" /></noscript>
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
            <li><a href="{$conf->action_root}bookList">Książki</a></li>
            <li class="active"><a href="{$conf->action_root}userList">Zarządzanie użytkownikami</a></li>
            <li><a href="{$conf->action_root}rentList">Wypożyczenia</a></li>
        </ul>
        <ul class="icons">
            <a href="{$conf->action_root}logout" class="button primary">Wyloguj</a>
        </ul>
    </nav>

    <div id="main">
        <div class="align-left">
        <div class="align-right">
            <a href="{$conf->action_root}userNew" class="button primary col-1-medium">Dodaj użytkownika</a> <br >
        </div>
            <form id="search-form" onsubmit="ajaxPostForm('search-form', '{$conf->action_root}userListPart', 'table'); return false;">
                <legend><b>Wyszukiwanie</b></legend>
                <input type="text" style="width: 30%; display: inline-block" placeholder="nazwisko" name="sf_lastname" value="{$searchForm->lastname}" />
                <button type="submit" class="primary small">Filtruj</button>
            </form>

        <div class="table-wrapper" id="table">
            {include file="TableUserList.tpl"}
        </div>
        <div>
            {if $msgs->isMessage()}
                <div class="messages bottom-margin">
                    <ul>
                        {foreach $msgs->getMessages() as $msg}
                            {strip}
                                <ul class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</ul>
                            {/strip}
                        {/foreach}
                    </ul>
                </div>
            {/if}
        </div>
        </div>
    </div>

    <!-- Copyright -->
    <div id="copyright">
        <ul><li>Design: <a href="https://html5up.net">HTML5 UP</a></li></ul>
    </div>

</div>

<!-- Scripts -->
<script src="{$conf->action_url}/style/assets/js/jquery.min.js"></script>
<script src="{$conf->action_url}/style/assets/js/jquery.scrollex.min.js"></script>
<script src="{$conf->action_url}/style/assets/js/jquery.scrolly.min.js"></script>
<script src="{$conf->action_url}/style/assets/js/browser.min.js"></script>
<script src="{$conf->action_url}/style/assets/js/breakpoints.min.js"></script>
<script src="{$conf->action_url}/style/assets/js/util.js"></script>
<script src="{$conf->action_url}/style/assets/js/main.js"></script>

</body>

</html>

</body>

</html>