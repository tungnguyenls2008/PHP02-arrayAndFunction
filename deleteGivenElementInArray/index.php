<?php
$random_number_array = range(0, 100);
shuffle($random_number_array);
$random_number_array = array_slice($random_number_array, 0, 100);
print_r($random_number_array);
$element = $_POST['elementToDelete'];
function deleteGivenElement($element,$array)
{
    if (($key = array_search($element, $array))!==false){
        echo "<br>";
        echo $key.'::'.$array[$key];
    unset($array[$key]);
        echo "<br>";
    print_r($array);
}
}
if (isset($_POST["submit"])){
    deleteGivenElement($element,$random_number_array);
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
    <input type="number" name="elementToDelete">
    <input type="submit" name="submit">
</form>
</body>
</html>
