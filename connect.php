<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>021-Karn</title>
</head>
<body>
    <?php
    $serverName = '127.0.0.1';
    $userName = 'root';
    $userPassword = '';
    $dbname = 'hospital';

    try {
        $conn = new PDO(
            "mysql:host=$serverName;dbname=$dbname;charset=UTF8",
            $userName,$userPassword
        );

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'You are now connecting to DataBase!';

    } catch (PDOException $e) {
        echo 'Sorry! You cannot connect to DataBase: ' . $e->getMessage();
    }
    ?>
</body>
</html>