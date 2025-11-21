<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>

<body>


    <form action="forgotProcess" method="POST">

        <h3>Forgot Password</h3>

        <?php
        if (isset($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {
                echo '<div style="color:red;">' . htmlspecialchars($error, ENT_QUOTES) . '</div>';
            }
            unset($_SESSION['errors']);
        }
        ?>
        <label for="email">Enter Email</label>
        <input type="email" name="email">

        <button type="submit">Submit</button>
    </form>


</body>

</html>