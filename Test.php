<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>023-Kittipat</title>
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
    require "connect.php";
    if(isset($_GET["P_name"])&& $_GET['P_name']!=null)
    {
        $sql = "SELECT * FROM patient,permissions where patient.P_id = permissions.P_CID AND P_name LIKE CONCAT('%', :P_name ,'%')";
    
        echo "<br>" . " sql =
        " .$sql . "<br>";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':P_name',$_GET['P_name']);
        $stmt->execute();
        ?>
           <table width="300" border="1">
        <tr>
            <th width="325">ชื่อ</th>
            <td width="240"><?php echo $result["P_name"]; ?></td>
        </tr>

        <tr>
            <th width="130">ยอดหนี้</th>
            <td><?php echo $result["P_debt"]; ?></td>
        </tr>

        <tr>
            <th width="130">บัญชี</th>
            <td><?php echo $result["P_Username"]; ?></td>
        </tr>
    <?php
        
        while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
    </table>

    
    <?php }
    if($_GET['P_name']==null)
    echo "<br> NO Data... <br>";
    $conn = null;
        }
    ?>