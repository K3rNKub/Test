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
    if (isset($_GET['P_name'])) {
        $strP_name = $_GET["P_name"];
    }
    require "connect.php";
    $sql = "SELECT P_id,P_name,P_Username FROM patient,permissions WHERE patient.P_id = permissions.P_CID AND P_name = ?";
    $params = array($strP_name);
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
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
            <th width="130">บัญชีผู้ใช้</th>
            <td><?php echo $result["P_Username"]; ?></td>
        </tr>

    </table>

    <?php
    $conn = null;
    ?>
</body>
</html>