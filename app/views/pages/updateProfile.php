<?php 

if(isset($_SESSION['update'])){

echo 
    '<!doctype html>
    <html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="2;url=index.php">
    <title>Profile Updated</title>
    <style>body{font-family:Arial,Helvetica,sans-serif;text-align:center;padding:40px}</style>
    </head>

    <body>

    <h2 style="color:green"> Profile Updata Successfully !</h2>

    <script>setTimeout(function(){window.location.href="/Profile?updated=15185";},2000);</script>

    </body>
    </html>';
}else{
    echo "Hello";
}


