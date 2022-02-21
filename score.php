<?php
header('Content-Type: text/plain; charset=utf-8');
if(isset($_POST['txt']))
{
    
    $input = $_POST['txt'];
    $file = fopen('scores.txt', 'a+');
    fwrite($file, $input);
    fclose($file);
    
}
?>