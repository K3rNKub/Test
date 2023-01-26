<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>021-Karn</title>
</head>
<body>
    <h1>Search Patient</h1>
    <form action="injection.php" method="GET">
    <input type="text" placeholder="Enter Patient Name" name="P_name">
    <br><br>
    <input type="submit">
    </form>
</body>
</html>

<?php
if(isset($_GET['P_name'])):
    echo"<br>" . $_GET['P_name'];
    require 'connect.php';
    $P_name = $_GET['P_name'];
    $count = 0;
    $sql = "SELECT * FROM patient,permissions WHERE patient.P_id = permissions.P_CID AND P_name LIKE :P_name";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':P_name',"%" .$P_name. "%");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    echo "<br> *************** <br>";

    while($row = $stmt->fetch()) {
        echo $row['P_name'].' '.$row['P_debt'].' '.$row['P_Username']."<br/>";
        $count++;
    }
    //echo "count ... "$count;
    if($count==0)
        echo"<br>No data ... <br>";
        $conn = null;
endif;
?>