<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Title</title>
</head>
<body>

<form action="" method="post">
    <table>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $rows = (int)$_REQUEST["rows"];
            $cols = (int)$_REQUEST["cols"];
            for ($i = 0; $i < $rows; $i++) {
                echo '<tr>';
                for ($j = 0; $j < $cols; $j++) {
                    echo '<td>';
                    echo '<input type="number" name="num[]">';
                    echo ' </td>';
                }
                echo '</tr>';
            }
        }
        ?>
    </table>
    <button type="submit" name="submit">FIND MAX</button>

    <?php
    function findMax($arr)
    {
        $max = $arr[0];
        for ($i = 1; $i < count($arr); $i++) {
            if ($arr[$i] > $max) {
                $max = $arr[$i];
            }
        }
        return $max;
    }

    ?>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $matrix = $_REQUEST["num"];
        echo "Matrix's max is: " . findMax($matrix);

    }
    ?>
</form>
</body>
</html>