<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>建立表單</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/func.js"></script>
    <style>
        button {
            height: 40px;
        }

        button:hover {
            background-color: #C7DDC1;
        }
    </style>
</head>

<body>
    <?php include "connect.php"; ?>
    <div class="form-container">
        <form action="createfun.php" method="post">
            <label for="group">新增團務表單：</label>
            <input type="text" name="groupname" placeholder="團務名稱">
            <br>
            <button id="g" type="submit" name="creategroup">建立團務表單</button>
        </form>
        <form action="createfun.php" method="post">
            <label for="claim">新增認領表單：</label>
            <input type="text" name="claimname" placeholder="認領名稱">
            <br>
            <button id="g" type="submit" name="createclaim">建立認領表單</button>
        </form>
        <form action="createfun.php" method="post" enctype="multipart/form-data">
            <label for="images">選擇要上傳的圖片：</label>
            <input type="file" name="images[]" id="images" multiple>
            <br>
            <button id="g" type="submit" name="submit">上傳圖片</button>
        </form>
    </div>
    <hr>
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
</body>