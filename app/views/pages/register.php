<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>

    <form action="/registerProcess" method="POST">

        <?php

        if (!empty($_SESSION['error'])) {
            echo '<div style="color:red;">' . htmlspecialchars($_SESSION['error'], ENT_QUOTES) .  ' </div>';
            unset($_SESSION['error']);
            var_dump($_SESSION['error']);
        } ?>

        <label for="firstName">First Name</label>
        <input type="text" name="firstName">
        <br>
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName">
        <br>
        <label for="email">Email</label>
        <input type="email" name="email">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password">
        <br>
        <label for="phoneNumber">Phone Number</label>
        <input type="text" name="phoneNumber">
        <br>
        <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <br>
        <label for="address">Address</label>
        <input type="text" name="address">
        <br>
        <button type="submit">Submit</button>
        <br>
        <a href="logIn.php">I have Alredy Account, Sign In</a>
    </form>

</body>

</html>