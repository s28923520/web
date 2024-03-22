<?php include_once "connect.php"; ?>
<?php
// get_table_data.php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset ($_GET["table"])) {
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

    // 查詢 "團務資料庫" 中是否存在選擇的資料表
    $sql_data = "SHOW TABLES LIKE '$selectedTable'";
    $result_data = $conn2->query($sql_data);

    // 查詢 "認領資料庫" 中是否存在選擇的資料表
    $sql_test = "SHOW TABLES LIKE '$selectedTable'";
    $result_test = $conn->query($sql_test);


    // 如果在兩個資料庫中都存在選取的表，則進行資料的顯示
    if ($result_data->num_rows > 0 && $result_test->num_rows > 0) {
        // 顯示團務資料
        // echo " $selectedTable 團務";
        $sql_data_select = "SELECT * FROM 團務.$selectedTable";
        $result_data_select = $conn2->query($sql_data_select);
        displayTable($result_data_select, 'th1');

        // 顯示團一資料表
        // echo " $selectedTable 認領";
        $sql_test_select = "SELECT * FROM $selectedTable";
        $result_test_select = $conn->query($sql_test_select);
        displayTable($result_test_select, '');
    } elseif ($result_data->num_rows > 0) {
        $sql_data_select = "SELECT * FROM 團務.$selectedTable";
        $result_data_select = $conn2->query($sql_data_select);
        displayTable($result_data_select, 'th1');

    } elseif ($result_test->num_rows > 0) {
        $sql_test_select = "SELECT * FROM $selectedTable";
        $result_test_select = $conn->query($sql_test_select);
        displayTable($result_test_select, '');

    } else {
        echo "無 '$selectedTable' 資料表";
    }
}

// 顯示資料表格的函式
function displayTable($result, $css)
{
    if ($result->num_rows > 0) {
        echo "<table>";
        // 顯示表格的欄位名稱
        $row = $result->fetch_assoc();
        echo "<tr>";
        foreach ($row as $key => $value) {
            if ($key !== 'id') {
                echo "<th id = '$css'>" . $key . "</th>";
            }
        }
        echo "</tr>";

        // 顯示資料
        $result->data_seek(0);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $key => $value) {
                // 不顯示 id 欄位的資料
                if ($key !== 'id') {
                    echo "<td>$value</td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "沒有資料可顯示。";
    }
}
?>