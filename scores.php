<?php
    
    session_save_path(__DIR__ . '/sessions/');
    session_name('shutTheBox');
    session_start();

    if($_SESSION['loggedin'] === false or !isset($_SESSION['loggedin'])){
        header('Location: login.php');
        exit;
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./username.js" defer></script>
    <script src="./welcome.js" defer></script>
    <script src="./scores.js" defer></script>
    <link rel='stylesheet' href='style.css'>
    <title>Shut The Box</title>
</head>
<body>
    <header>
        <h1>
            Shut The Box
        </h1>
    </header>
    <section>
        <h2>
            Scores
        </h2>
        <p>
            Well done! Here are the scores so far...
        </p>
        <p id='scores'>
        <?php
            if(file_exists("scores.txt")){
                echo file_get_contents("scores.txt");
            }
        ?>
        </p>
    </section>
    <fieldset>
        <input type="button" id="btn" value="PLAY AGAIN!!!" onclick="redirect();">
    </fieldset>
    <fieldset>
        <input type="button" id="btn" value="Force update / start updating" onclick="force_print();">
        <input type="button" id="btn" value="Stop updating" onclick="stop_printing();">
    </fieldset>
    <footer>
        <hr>
        <small>&copy; Jion Kim, 2021 (the year after the world ended)</small>
    </footer>
</body>
</html>