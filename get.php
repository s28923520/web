<?php include_once "connect.php"; ?>
<?php
// get_table_data.php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["table"])) {
    $selectedTable = $_GET["table"];

    $result = $conn->query("DESCRIBE $selectedTable");
    
    echo "<h3>$selectedTable</h3>";

        // 顯示圖片
        // echo "<img src='./img/$selectedTable*.jpg' alt='$selectedTable'>";
        // echo "<br>";
        $imagePath = "img/$selectedTable*.*";
        $images = glob($imagePath);
        if ($images) {
            echo "<div class='image-container'>";
            foreach ($images as $image) {
                echo "<img src='$image' alt='$selectedTable'>";
            }
            echo "</div>";
            echo "<br>";
        } else {
            echo "找不到符合條件的圖片";
        }

        // 查詢 "data" 資料庫的團務資料
        $sql_data = "SELECT * FROM 團務 WHERE 品項 = '$selectedTable'";
        $result_data = $conn2->query($sql_data);

        // 查詢 "test" 資料庫的團一資料表
        $sql_test = "SELECT * FROM $selectedTable";
        $result_test = $conn->query($sql_test);
        echo "<table>";;

        // 顯示團務
        echo "<tr>";
        $result_data->data_seek(0);
        while ($row_data = $result_data->fetch_assoc()) {
            foreach ($row_data as $key_data => $value_data) {
                if ($key_data !== 'id') {
                    echo "<th id='th1'>" . $key_data . "</th>";
                }
            }
            break;  // 只顯示一次欄位名稱
        }
        echo "</tr>";

        // 顯示資料
        $result_data->data_seek(0);
        while ($row_data = $result_data->fetch_assoc()) {
            echo "<tr>";
            foreach ($row_data as $key_data => $value_data) {
                echo "<td>$value_data</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        //團一資料表
        echo "<table>";
        echo "<tr>";
        // 顯示表格的欄位名稱
        while ($row = $result->fetch_assoc()) {
            if ($row['Field'] !== 'id') {
                echo "<th>" . $row['Field'] . "</th>";
            }
        }

        $dataResult = $conn->query("SELECT * FROM $selectedTable");

        while ($dataRow = $dataResult->fetch_assoc()) {
            echo "<tr>";
            foreach ($dataRow as $key => $value) {
                // 不顯示 id 欄位的資料
                if ($key !== 'id') {
                    echo "<td>$value</td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    }
?>
