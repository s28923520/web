<?php
include_once "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset ($_POST["creategroup"])) {
        $groupName = $_POST["groupname"];
        createTable($conn2, "團務", $groupName);
    } elseif (isset ($_POST["createclaim"])) {
        $claimName = $_POST["claimname"];
        createTable($conn, "認領", $claimName);
    }
    // else {
    //     echo "未知的操作類型";
    // }
}

function createTable($conn, $database, $tableName)
{
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
            `id` INT(20) AUTO_INCREMENT PRIMARY KEY ,
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


if (isset ($_FILES["images"])) {
    $target_dir = "img/"; // 指定圖片保存的目錄
    // $target_file = $target_dir . basename($_FILES["image"]["name"]); // 指定圖片保存的完整路徑
    $uploadOk = 1;
    foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
        $target_file = $target_dir . basename($_FILES["images"]["name"][$key]); // 指定圖片保存的完整路徑
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // 檢查文件是否為圖片
        $check = getimagesize($_FILES["images"]["tmp_name"][$key]);
        if ($check == false) {
            echo "非圖檔";
            $uploadOk = 0;
        }

        // 檢查文件是否已存在
        if (file_exists($target_file)) {
            echo "圖片已存在";
            $uploadOk = 0;
        }

        // 檢查文件大小
        if ($_FILES["images"]["size"][$key] > 500000) {
            echo "圖片太大.";
            $uploadOk = 0;
        }

        // 允許特定的文件格式
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "只允許JPG,JPEG,PNG,GIF";
            $uploadOk = 0;
        }

        // 檢查 $uploadOk 是否為 0
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["images"]["tmp_name"][$key], $target_file)) {
                echo basename($_FILES["images"]["name"][$key]) . "已上傳";
            } else {
                echo "圖片上傳失敗";
            }
        }
    }
}

?>