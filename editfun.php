<?php
include_once "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["table"])) {
    $selectedTable = $_POST["table"];

    // 檢查表單提交的是團務資料還是認領資料
    if (isset($_POST["addgdata"])) { // 新增團務資料
        $gname = $_POST["gname"];
        $amount = $_POST["amount"];
        $fettle = $_POST["fettle"];
        $date = $_POST["date"];
        $NTD = $_POST["NTD"];

        // 插入資料到相應的資料庫表中
        $sql = "INSERT INTO `$selectedTable` (`品項`, `數量`, `貨況`, `官方預計發售日`, `金額`) VALUES ('$gname', '$amount', '$fettle', '$date', '$NTD')";
        if ($conn2->query($sql) === TRUE) {
            echo "團務資料已成功新增";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST["addcdata"])) { // 新增認領資料
        $role = $_POST["role"];
        $claimant = $_POST["claimant"];

        // 插入資料到相應的資料庫表中
        $sql = "INSERT INTO `$selectedTable` (`角色`, `認領人`) VALUES ('$role', '$claimant')";
        if ($conn->query($sql) === TRUE) {
            echo "認領資料已成功新增";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    header("Location: edit.php");
}
?>
