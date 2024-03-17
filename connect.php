<?php
//連線資料庫
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "認領";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}

$tables = $conn->query("SHOW TABLES");

$dbname2 = "團務";
// 建立連接
$conn2 = new mysqli($servername, $username, $password, $dbname2);

// 檢查連接是否成功
if ($conn2->connect_error) {
    die("連接失敗: " . $conn2->connect_error);
}


?>