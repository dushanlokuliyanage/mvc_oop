<?php

if (isset($_SESSION['user'])) {
    echo '<!doctype html>
    <html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="2;url=index.php">
    <title>Logouting...</title>
    <style>body{font-family:Arial,Helvetica,sans-serif;text-align:center;padding:40px}</style>
    </head>

    <body>

    <h3 style="color:red">Logout Successfully !.</h3>

    <script>setTimeout(function(){window.location.href="/";},2000);</script>

    </body>
    </html>';
    session_destroy();
}
