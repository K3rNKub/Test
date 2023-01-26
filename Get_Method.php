<html>
<head>
    <title>Test SQL injection</title>
</head> 
<body>
    <h1>Test SQL injection</h1>
    <form action="select_sqlinjection_solution-bindparam-like.php" method="GET">

    <input type="text" placeholder="Enter Customer ID" name="customerID">
    <input type="submit">
</form>
</body>
</html>

<?php
$count =0;
if (isset($_GET['customerID'])&& $_GET['customerID'] !=null)
{
    echo "<br> get value =". $_GET['customerID'];
    require 'connect.php';

    $sql ="SELECT * FROM customer where CustomerID like CONCAT ('%',:customerID,'%j)";

    echo "<br>sql=".$sql;
    $stmt =$conn->prepare($sql);
    $stmt->bindParam(':customerID',$_GET['customerID']);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo "<br>*************<br>";

    while ($row = $stmt->fetch()){
        echo $row['CustomerID'].''.$row['Name']."<br/>";
        $count++;
    }
    echo "count...".$count;
}
    if($count==0)
    echo"<br>NO data...<br>";
    $conn =null;

