<!DOCTYPE HTML>
<html>
<head>
    <title>Biblioteka | Logowanie</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{$conf->action_url}/style/assets/css/main.css" />
    <noscript><link rel="stylesheet" href="{$conf->action_url}/style/assets/css/noscript.css" /></noscript>
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

        <form action="{$conf->action_root}login" method="post">
            <div class="row gtr-uniform">
                <div class="col-4-xlarge">
                    <label for="login">Login: </label>
                    <input type="text" name="login" id="login" placeholder="login" />
                </div>
                <div class="col-4-xlarge">
                    <label for="password">Hasło: </label>
                    <input type="password" name="password" id="password" />
                </div>
                {if $loginFailed gt 4}
                <div class="col-6-xlarge">
                    <label for="captcha">Przepisz kod z obrazka</label>
                    <img src="{$conf->action_url}/captcha.php" alt="CAPTCHA" class="captcha-image">
                    <br>
                    <input type="text" style="margin-top: 5px; width: 170px; height: 30px; border: 1px solid black" id="captcha" name="captcha">
                </div>
                {/if}
                <div class="col-12">
                    <ul class="actions">
                        <li><input type="submit" value="Zaloguj" class="primary" /></li>
                        <li><a class="button primary medium" href="{$conf->action_root}registration">Zarejestruj się</a></li>
                    </ul>
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
    </footer>

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