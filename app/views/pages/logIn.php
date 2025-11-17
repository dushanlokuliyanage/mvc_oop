
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>

<body>

    <form action="/logInProcess" method="POST">


        <?php

        if (!empty($_SESSION['errors'])) {
            echo '<div style="color:red;">' . htmlspecialchars($_SESSION['errors'], ENT_QUOTES) . '</div> <br>';
            unset($_SESSION['errors']);
        }

        ?>

        <label for="email">Email</label>
        <input type="email" name="email">

        <label for="password">Pssword</label>
        <input type="password" name="password">

        <button type="submit">Log In</button>
        <a href="/register">I don't have Alredy Account, Register</a>
    </form>

</body>

</html>