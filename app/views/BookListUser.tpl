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
            <li class="active"><a href="{$conf->action_root}bookListUser">Książki</a></li>
            <li><a href="{$conf->action_root}rentsListUser">Moje wypożyczenia</a></li>
        </ul>
        <ul class="icons">
            <a href="{$conf->action_root}logout" class="button primary">Wyloguj</a>
        </ul>
    </nav>

    <div id="main">
        <div class="align-left">
        <!-- <a href="{$conf->action_root}availableBooks" class="button primary">Dostępne książki</a> -->
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
                                    {if $b["status"] eq "dostępna"}
                                    <a href="{$conf->action_url}bookRentUser/{$b['id']}" class="button primary small">Wypożycz</a>
                                    {/if}
                                    {if $b["status"] eq "wypożyczona"}
                                        <a class="button primary small disabled">Wypożycz</a>
                                    {/if}
                                </td>
                            </tr>
                        {/strip}
                    {/foreach}
                    </tbody>
                </table>
            </div>
            <div align="center">
                {if $page lte 1}
                    <a href="{url action='bookListUser' page=$page-1}" class="button small disabled"><</a>
                {else}
                    <a href="{url action='bookListUser' page=$page-1}" class="button small"><</a>
                {/if}
                <a href="{url action='bookListUser' page=$page}" class="button primary small">{$page}</a>

                {if $oneMorePage}
                    <a href="{url action='bookListUser' page=$page+1}" class="button small">{$page+1}</a>
                {/if}

                {if $twoMorePages}
                    <a href="{url action='bookListUser' page=$page+2}" class="button small">{$page+2}</a>
                {/if}

                {if $limit gt $page}
                    <a href="{url action='bookListUser' page=$page+1}" class="button small">></a>
                {else}
                    <a href="{url action='bookListUser' page=$page+1}" class="button small disabled">></a>
                {/if}


            </div>
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