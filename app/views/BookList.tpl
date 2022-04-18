<!DOCTYPE HTML>
<html>
<head>
    <title>Biblioteka | Książki</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{$conf->action_url}/style/assets/css/main.css" />
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
            <li class="active"><a href="{$conf->action_root}bookList">Książki</a></li>
            <li><a href="{$conf->action_root}userList">Zarządzanie użytkownikami</a></li>
            <li><a href="{$conf->action_root}rentList">Wypożyczenia</a></li>
        </ul>
        <ul class="icons">
            <a href="{$conf->action_root}logout" class="button primary">Wyloguj</a>
        </ul>
    </nav>

    <div id="main">
        <section class="align-left">
            <a href="{$conf->action_root}bookNew" class="button primary col-1-medium">Dodaj książkę</a> <br >
        </section>

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
                    {foreach $books as $b}
                        {strip}
                            <tr>
                                <td>{$b["author"]}</td>
                                <td>{$b["title"]}</td>
                                <td>{$b["status"]}</td>
                                <td>
                                    <a href="{$conf->action_url}bookEdit/{$b['id']}" class="button primary small">Edytuj</a>
                                    &nbsp;
                                    <a href="{$conf->action_url}bookDelete/{$b['id']}" class="button primary small">Usuń</a>
                                </td>
                            </tr>
                        {/strip}
                    {/foreach}
                    </tbody>
                </table>
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