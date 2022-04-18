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

    <div id="main">
        <h2>Dodaj książkę</h2>

        <form action="{$conf->action_root}bookSave" method="post">
            <div class="row gtr-uniform">
                <div class="col-4-xlarge">
                    <label for="author">Autor</label>
                    <input id="author" type="text" placeholder="autor" name="author" value="{$form->author}">
                </div>
                <div class="col-4-xlarge">
                    <label for="title">Tytuł</label>
                    <input id="title" type="text" placeholder="tytuł" name="title" value="{$form->title}">
                </div>
                <div class="col-12">
                    <ul class="actions">
                        <li><input type="submit" value="Zapisz" class="primary" /></li>
                        <li><a href="{$conf->action_root}bookList" class="button">Powrót</a></li>
                    </ul>
                </div>
                <div class="col-12">
                    <input type="hidden" name="id" value="{$form->id}">
                </div>
            </div>
        </form>

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