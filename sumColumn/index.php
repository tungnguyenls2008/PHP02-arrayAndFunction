<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body>
<?php
$row = $col = "";
if (isset($_POST["row"]) && isset($_POST["col"])) {
    $_SESSION["row"] = $_POST["row"];
    $_SESSION["col"] = $_POST["col"];
    $row = $_SESSION["row"];
    $col = $_SESSION["col"];
}
?>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <input type="number" placeholder="row of array" value="<?php echo $row ?>" name="row" style='width:100px;'>
    <input type="number" placeholder="col of array" value="<?php echo $col ?>" name="col" style='width:100px;'>
    <input type="submit" value="Size of array">
</form>
<?php
if (isset($_POST["row"]) && isset($_POST["col"])) {
    echo "<form method='POST'><table><tbody>";
    for ($i = 0; $i < $row; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $col; $j++) {
            echo "<td><input type='number' style='width:100px' name='pos[$i][$j]'></td>";
        }
        echo "</tr>";
    }
    echo "</tbody></table><input type='number' placeholder='column position' name='ColPosition'><br>";
    echo "<input name='sumOfCol' type='submit' value='Sum of col'></form>";
}
if (isset($_POST["sumOfCol"])) {
    $row = $_SESSION["row"];
    $col = $_SESSION["col"];
    $sumOfCol = 0;
    for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $col; $j++) {
            $matrix[$i][$j] = $_POST["pos"][$i][$j];
        }
    }
    for ($i = 0; $i < $row; $i++) {
        $sumOfCol += $matrix[$i][$_POST["ColPosition"] - 1];
    }

    echo "<table><tbody>";
    for ($i = 0; $i < $row; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $col; $j++) {
            echo "<td style='width:50px;'>" . $matrix[$i][$j] . "</td>";
        }
        echo "</tr>";
    }
    echo "</tbody></table><br><b>Sum of Column " . ($_POST["ColPosition"]) . " is :</b>" . $sumOfCol;
}
?>
</body>

</html>