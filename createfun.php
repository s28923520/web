<?php
include_once "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset ($_POST["creategroup"])) {
        $groupName = $_POST["groupname"];
        createTable($conn2 , "團務", $groupName);
    } elseif (isset ($_POST["createclaim"])) {
        $claimName = $_POST["claimname"];
        createTable($conn , "認領", $claimName);
    } else {
        echo "未知的操作類型";
    }
}

function createTable($conn, $database, $tableName) {
    if ($database == "團務") {
        $sql = "CREATE TABLE `$database`.`$tableName` (
            `品項` VARCHAR(30) NOT NULL,
            `數量` VARCHAR(15) NOT NULL,
            `貨況` VARCHAR(30) NOT NULL,
            `官方預計發售日` VARCHAR(30) NOT NULL,
            `金額` VARCHAR(15) NOT NULL
        ) ";
    } elseif ($database == "認領") {
        $sql = "CREATE TABLE `$database`.`$tableName` (
            `ID` INT(20) AUTO_INCREMENT PRIMARY KEY ,
            `角色` VARCHAR(10) NOT NULL,
            `認領人` VARCHAR(50) NULL
        ) ";
        
    } else {
        echo "資料庫名稱錯誤";
        return;
    }

    if ($conn->query($sql) === TRUE) {
        echo "資料表 $tableName 創建成功";
        header("Location: create.php");
    } else {
        echo "創建資料表時出現錯誤: " . $conn->error;
    }
}

?>