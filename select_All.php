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
    $sql = "SELECT P_id,P_name,P_DOB,P_debt,P_Username FROM patient,permissions WHERE patient.P_id = permissions.P_CID"; 
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo '<br>';
    echo '<br>';

    ?>

    <table width="800" border="1">
        <tr>
            <th width="90"> <div align="center">รหัส</div></th>
            <th width="140"> <div align="center">ชื่อ</div></th>
            <th width="120"> <div align="center">วันเกิด</div></th>
            <th width="100"> <div align="center">ยอดหนี้</div></th>
            <th width="50"> <div align="center">บัญชีผู้ใช้</div></th>
        </tr>
        
        <?php
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
        
        <tr>
            <td><?php echo $result["P_id"]; ?></td>
            <td>
            <a href="detail.php?P_name=<?php echo $result["P_name"]; ?>">
            <?php echo $result["P_name"]; ?>
            </td>
            <td><?php echo $result["P_DOB"]; ?></td>
            <td><?php echo $result["P_debt"]; ?></td>
            <td><?php echo $result["P_Username"]; ?></td>
        </tr>
        
        <?php
        }
        ?>
        
    </table>

    <?php
    $conn = null;
    ?>

</body>
</html>