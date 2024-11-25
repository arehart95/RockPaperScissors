<?php
if ( isset($_POST['cancel'] ) ) {
    header("Location: index.php");
    return;
}

    $salt = 'XyZzy12*_';
    $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';

$failure = false;

if ( isset($_POST['who']) && isset($_POST['pass']) ) {
    if ( strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 ) {
        $failure = "User name and password are required";
    } else {
        $check = hash('md5', $salt.$_POST['pass']);
        if ( $check == $stored_hash ) {
            header("Location: game.php?name=".urlencode($_POST['who']));
            return;
        } else {
            $failure = "Incorrect password";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log in </title>
</head>
<body>
    <h1>Please Log In</h1>
        <?php
        if ($failure !== false) {
            echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
        }
        ?>
    <p>
    <form method="POST">
        <label for="name">User Name: </label>
        <input type="text" name="who" id="name"><br>
        <label for="pass">Password: </label>
        <input type="text" name="pass" id="pass">
        <input type="submit" value="Log In">
        <input type="submit" name="cancel" value="Cancel"
    </form>

</body>

</html>
