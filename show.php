<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>揪團表單</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/func.js"></script>
</head>

<body>
    <?php include_once "connect.php"; ?>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="tableForm">
        <select name="table" onchange="getTableData()">
            <option value="" disabled selected>請選擇資料表</option>
            <?php
            $tables->data_seek(0);
            while ($row = $tables->fetch_row()) {
                $selected = ($_POST["table"] == $row[0]) ? "selected" : "";
                echo "<option value='" . $row[0] . "'$selected>" . $row[0] . "</option>";
            }
            ?>
        </select>
    </form>
    <div id="tableDataContainer"></div>
    <!-- 浮動按鈕 icon、連結可變更-->
    <div id="floatbuttons">
        <img id="scrollToTop" src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-chevron-up-512.png" alt="回到頁首" onclick="scrollToTop()">
        <br>
        <br>
        <a href="https://www.plurk.com/" target="_blank">
            <img src="https://s.plurk.com/brand/479e7351bbf90f495360.png" alt="plurk">
        </a>
        <br>
        <a href="https://www.facebook.com/" target="_blank">
            <img src="./logo/Facebook.png" alt="facebook">
        </a>
    </div>
</body>
<script>
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>
</html>