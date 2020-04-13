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


<?php
function loadRegistrations($filename)
{
    $jsonData = file_get_contents($filename);
    return json_decode($jsonData, true);
}

function saveDataJSON($filename, $username, $email, $tel)
{
    try {
        $contact = array(
            'username' => $username, 'email' => $email, 'tel' => $tel
        );
        $arr_data = loadRegistrations($filename);
        array_push($arr_data, $contact);
        $jsonData = json_encode($arr_data, JSON_PRETTY_PRINT);
        file_put_contents($filename, $jsonData);
        echo 'Data successfully saved';
    } catch (Exception $e) {
        echo "ERROR: ", $e->getMessage(), "\n";
    }
}

$usernameErr = NULL;
$emailErr = NULL;
$telErr = NULL;
$username = NULL;
$email = NULL;
$tel = NULL;

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $hasError = false;
    if (empty($username)) {
        $usernameErr = "Username can't be empty!";
        $hasError = true;
    }
    if (empty($email)) {
        $emailErr = "Email can't be empty!";
        $hasError = true;
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Not a valid email.";
            $hasError = true;
        }
    }
    if (empty($tel)) {
        $telErr = "Phone number is a must!";
        $hasError = true;
    }
    if ($hasError === false) {
        saveDataJSON("users.json", $username, $email, $tel);
        $username = NULL;
        $email = NULL;
        $tel = NULL;
    }


}
?>
<form method="post">
    <table>
        <tr>
            <td>USER NAME:</td>
            <td><input type="text" name="username" value="<?php echo $username; ?>">
                <span class="error">* <?php echo $usernameErr; ?></span></td>
        </tr>
        <tr>
            <td>EMAIL:</td>
            <td><input type="text" name="email" value="<?php echo $email; ?>">
                <span class="error">* <?php echo $emailErr; ?></span></td>
        </tr>
        <tr>
            <td>TEL:</td>
            <td><input type="tel" name="tel" value="<?php echo $tel; ?>">
                <span class="error">* <?php echo $telErr; ?></span></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="submit" value="REGISTER">
                <p><span class="error">* required field.</span></p></td>
        </tr>
    </table>
</form>
<?php
$registrations = loadRegistrations('users.json');
?>
<h2>Registration list</h2>
<table>
    <tr>
        <th>USERNAME</th>
        <th>EMAIL</th>
        <th>TEL</th>
    </tr>
    <?php foreach ($registrations as $registration): ?>
        <tr>
            <td><?= $registration['username']; ?></td>
            <td><?= $registration['email']; ?></td>
            <td><?= $registration['tel']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
