<?php
// See the password_hash() example to see where this came from.
require_once 'assets/sessioncheck.php';
require_once 'assets/functions.php';
//session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
print_r($_POST);
if(isset($_POST['submit'])) {
    
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $password = $_POST['password'];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    if (updateUser($_SESSION['username'], $name, $email, $passwordHash)) {
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        echo "Profil uppdaterad.";
    } else {
        echo "Något gick fel. Försök igen.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <h1>Profil</h1>
    <p><a href="index.php">Tillbaka</a></p>
<fieldset>
    <form method="post" action="">
        <p>Username: <?php echo $_SESSION['username']; ?></p>
        <label for="name">Name:</label>
        <input type="text" name="name" id="namechange" value="<?php echo $_SESSION['name']; ?>">
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email"id="emailchange" value="<?php echo $_SESSION['email']; ?>">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="passwordchange" value="<?php echo $_SESSION['password']; ?>">
        <br>
        <input type="submit" name="submit" id="uppdatera" value="Update">
    </form>
</fieldset>
</body>
</html>

