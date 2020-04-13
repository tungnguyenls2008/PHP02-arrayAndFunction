<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <input type="number" name="first" placeholder="Enter your first number">
    <input type="number" name="second" placeholder="Enter your second number">
    <input type="submit" name="submit" value="DO IT!">


</form>
<?php
function calc($x, $y)
{
    echo 'Summary: '.($x + $y) . '<br>';
    echo 'Subtraction: '.($x - $y) . '<br>';
    echo 'Multiplication: '.($x * $y) . '<br>';
    if ($y == 0) {
        throw new Exception("You can't divide by zero.");
    }
    echo 'Division: '.($x / $y) . '<br>';
}

if (isset($_POST["submit"])) {
    $x = $_POST['first'];
    $y = $_POST['second'];
    try {
        calc($x, $y);
    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }
}
?>
</body>
</html>
