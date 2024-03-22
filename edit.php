<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增資料</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/func.js"></script>
    <style>
        button {
            height: 40px;
        }

        button:hover {
            background-color: #C7DDC1;
        }
        .inline-inputs input {
        display: inline-block;
        vertical-align: top; /* 設置對齊方式，使 input 元素與 label 的上方對齊 */
        margin-right: 10px; /* 設置間距 */
    }
    </style>
</head>

<body>
    <?php include "connect.php"; ?>

    <form method="post" action="editfun.php" id="tableForm">
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

    <br></br>
    <form action="editfun.php" method="post">
        
        <label for="group">新增團務資料：</label>
        <input type="text" name="gname" placeholder="品項">
        <input type="text" name="amount" placeholder="數量">
        <input type="text" name="fettle" placeholder="貨況">
        <input type="text" name="date" placeholder="官方預計發售日">
        <input type="text" name="NTD" placeholder="金額">
        <br>
        <button type="submit" name="addgdata">新增團務資料</button>

    <br>   <br></br>
    <form action="editfun.php" method="post">
        <label for="claim">新增認領資料：</label>
        <input type="text" name="role" placeholder="角色">
        <input type="text" name="claimant" placeholder="認領人">

        <br>
        <button type="submit" name="addcdata">新增認領資料</button>
    </form>

    <hr>

    <div id="tableDataContainer"></div>
</body>