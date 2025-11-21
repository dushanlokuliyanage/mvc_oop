<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crete New Password</title>
</head>

<body>
    <h4>Crete New Password</h4>

    <form action="newPasswordProcess" method="POST">

        <?php
        if (!empty($_SESSION['errorNewPassword'])) {
           
                echo '<div style="color:red;">' . htmlspecialchars($_SESSION['errorNewPassword'], ENT_QUOTES) . '</div>';
            }
            //var_dump($_SESSION['errorNewPassword']);
        
           unset($_SESSION['errorNewPassword']);
        ?>

        <br><br>

        <?php
        if (isset($_SESSION['fcode'])) {
            echo 'Verify Key :' . htmlspecialchars($_SESSION['fcode'], ENT_QUOTES);
        }
            unset($_SESSION['fcode']);
;
        ?>

        <br><br>

        <label for="VerifyKey">Enter Verify Key</label>
        <input type="text" name="v-key" value="<?php echo htmlspecialchars($_SESSION['data'][0] ?? '', ENT_QUOTES); ?>">

        <label for="newPassword">New Password</label>
        <input type="text" name="n-password" value="<?php echo htmlspecialchars($_SESSION['data'][1] ?? '', ENT_QUOTES); ?>">

        <label for="re-password">Re-enter Passowrd</label>
        <input type="text" name="re-password" value="<?php echo htmlspecialchars($_SESSION['data'][2] ?? '', ENT_QUOTES); ?>">

        <button  >Submit</button>
    </form>
</body>

</html>