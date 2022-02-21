<?php
session_save_path(__DIR__ . '/sessions/');
session_name('shutTheBox');
session_start();

$incorr_submis = false;
$direct = $_SERVER['PHP_SELF'];

# forMichael8andSam3 using md2 envcryption
if(isset($_POST['passwordSubmitted'])){
    validate($_POST['passwordSubmitted'], $incorr_submis);
}

function validate($submiss, &$incorr_submis){
    $file = fopen('h_password.txt', 'r') or die('Unable too find the hashed password');
    $hashed_password = fgets($file);
    $hashed_password = trim($hashed_password);
    fclose($file);

    $hashed_submiss = hash('md2', $submiss);

    if ($hashed_password != $hashed_submiss){
        $_SESSION['loggedin'] = false;
        $incorr_submiss = true;
    }
    if($hashed_password == $hashed_submiss){
        $_SESSION['loggedin'] = true;
        header('Location: welcome.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./username.js" defer></script>
    <script src="./welcome.js" defer></script>
    <link rel='stylesheet' href='style.css'>
    <title>Shut The Box</title>
</head>
<body>
    <header>
        <h1>
            Welcome! Ready to play "Shut the Box"?
        </h1>
    </header>
    <section>
        <h2>
            Login
        </h2>
        <p>
            In order to play you need the password.
        </p>
        <p>
            If you know it, please enter it below and login.
        </p>
    </section>
    <fieldset>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <label for="password">Password: </label>
            <input type="password" id="passwordSubmitted" name="passwordSubmitted">
            <input type="submit" id="btn" value="Login">
        </form>
    </fieldset>
    <?php
        if ($incorr_submis) {
            echo '<p>Invalid password!</p>';
        }
    ?>
    <footer>
        <hr>
        <small>&copy; Jion Kim, 2021 (the year after the world ended)</small>
    </footer>
</body>
</html>
