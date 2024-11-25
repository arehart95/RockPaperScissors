<?php
//if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
//    die('Name parameter missing');
//}

    if (isset($_POST['logout'])) {
        header('Location: index.php');
        return;
    }

    $names = array('Rock', 'Paper', 'Scissors');
    $human = isset($_POST['human']) ? $_POST['human'] + 0 : -1;

    $computer = rand(0,2);

    function check($computer, $human) {
        if ($computer != $human) {
            if ($computer == 0 && $human == 1) {
                return "You win";
            } else if ($computer == 0 && $human == 2) {
                return "You lose";
            } else if ($computer == 1 && $human == 0) {
                return "You lose";
            } else if ($computer == 1 && $human == 2) {
                return "You win";
            } else if ($computer == 2 && $human == 0) {
                return "You win";
            } else if ($computer == 2 && $human == 1) {
                return "You lose";
            }
        } else {
            return "Tie";
        }
        return false;
    }

    $result = check($computer, $human);
    ?>

<!DOCTYPE html>

<html lang="en">
<head>
    <title>Let's play! </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Rock Paper Scissors</h1>
<?php
    if (isset($_REQUEST['name']) ) {
        echo "<p>Welcome: ";
        echo htmlentities($_REQUEST['name']);
        echo "</p>";
    } ?>
<form method="post">
    <label for="human">Make a Selection
        <select name="human">
            <option value="-1">Select</option>
            <option value="0">Rock</option>
            <option value="1">Paper</option>
            <option value="2">Scissors</option>
            <option value="3">Test</option>
        </select>
        <input type="submit" value="Play">
        <input type="submit" name="logout" value="Logout">
    </label>
</form>
<pre>
    <?php
    if ($human == -1) {
        print "Please select a strategy and press play";
    } else if ($human == 3) {
        for ($c = 0; $c < 3; $c++) {
            for ($h = 0; $h < 3; $h++) {
                $r = check($c, $h);
                print "Human = $names[$h] Computer = $names[$c] Result = $r\n";
            }
        }
    } else {
        print "Your Play=$names[$human]\n Computer Play=$names[$computer]\n Result=$result\n";
    } ?>
</pre>
</body>
</html>
