<?php
function generateRandomString($length = 30) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
if (isset($_POST["submit"])){
    $str=generateRandomString();
    $arr=str_split($str);
    $designatedChar=$_POST['designatedChar'];
    $count=0;
    var_dump($str);
    for($i=0;$i<count($arr);$i++){
        if ($designatedChar==$arr[$i]){
            $count++;
        }
    }
    echo '<br>';
    echo 'The Character '.'"'.$designatedChar.'"'.' appeared '.$count.' times inside the given string.';
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
<body><form method="post">
<input type="text" name="designatedChar">
<input type="submit" name="submit" value="FIND IT!">
</form>
</body>
</html>
