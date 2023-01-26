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
    require "connect.php";
    $sql = "SELECT * FROM patient,permissions WHERE patient.P_id = permissions.P_CID AND P_debt BETWEEN 1000 AND 3000"; 
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo '<br>';
    echo '<br>';
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($result);

    ?>
    <table width="300" border="1">
        <tr>
            <th width="325">รหัส</th>
            <td width="240"><?php echo $result["P_id"]; ?></td>
        </tr>

        <tr>
            <th width="130">ชื่อ</th>
            <td><?php echo $result["P_name"]; ?></td>
        </tr>


        <tr>
            <th width="130">ยอดหนี้</th>
            <td><?php echo $result["P_debt"]; ?></td>
        </tr>
        <tr>
            <th width="130">บัญชีผู้ใช้</th>
            <td><?php echo $result["P_Username"]; ?></td>
        </tr>
    </table>

    <?php
    $conn = null;
    ?>

</body>
</html>