<?php
function randomNumberArray()
{
    $random_number_array = range(0, 100);
    shuffle($random_number_array);
    $random_number_array = array_slice($random_number_array, 0, 100);
    return $random_number_array;
}

function showKeyElement()
{
    $arr = randomNumberArray();
    var_dump($arr);
    $key = $_POST['keyInput'];
    if($key<0||$key>100){
        throw new Exception("Your key is invalid.");
    }
    echo '<br>'.'The key '.$key.' has the value of '.$arr[$key];
}

if (isset($_POST['submit'])) {
    try {
        showKeyElement();
    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();

    }
}
?>
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
    <input type="number" name="keyInput">
    <input type="submit" name="submit" value="FIND IT!">
</form>
</body>
</html>
