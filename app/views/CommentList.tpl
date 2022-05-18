<!DOCTYPE HTML>
<html>
<head>
    <title>Biblioteka | Opinie</title>
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

    <div id="main">
        <div class="col-6">
        <h2>Opinie biblioteki</h2>
        <a href="{$conf->action_root}login" class="button small">Powrót</a>
            <a class="button small" href="{$conf->action_root}commentNew">Dodaj opinię</a>
        </div>

        <table style="margin-left: 50px; margin-right: 50px">
            <thead>
            <tr>
                <th>Imię</th>
                <th>Opinia</th>
                <th>Data dodania</th>
            </tr>
            </thead>
            <tbody>
            {foreach $comments as $c}
                {strip}
                    <tr>
                        <td>{$c["name"]}</td>
                        <td>{$c["comment"]}</td>
                        <td>{$c["date"]}</td>
                    </tr>
                {/strip}
            {/foreach}
            </tbody>
        </table>

        <div class="align-left">
            {if $msgs->isMessage()}
                <div class="label">
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