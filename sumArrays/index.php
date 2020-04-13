<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body><form method="post">
<input type="text" name="firstArray" placeholder="Separated by spaces">
<input type="text" name="secondArray" placeholder="Separated by spaces">
<input type="submit" name="submit" value="MERGE THEM!"></form>
<?php
if (isset($_POST["submit"])){
    $firstArray=explode(' ',$_REQUEST['firstArray']);
    $newArray01 = array_map( create_function('$value', 'return (int)$value;'),
        $firstArray);
    $secondArray=explode(' ',$_REQUEST['secondArray']);
    $newArray02 = array_map( create_function('$value', 'return (int)$value;'),
        $secondArray);
    $mergedArray=array_merge($newArray01,$newArray02);

    echo 'The merged array is: '; print_r($mergedArray);
}
?>
</body>
</html>