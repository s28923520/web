<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增資料</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/func.js"></script>
    <style>
        .label {
            display: flex;
            justify-content: center;
            /* 水平置中 */
        }

        .fd {
            display: flex;
            flex-direction: column;
            margin-right: 20px;
            /* 調整兩個區塊之間的間距 */
        }

        .fd label {
            margin-bottom: 5px;
            /* 調整標籤與輸入框之間的垂直間距 */
        }

        .fd button {
            margin-top: 10px;
            /* 調整按鈕與輸入框之間的垂直間距 */
            align-self: center;
            /* 讓按鈕在父容器中水平置中 */
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
        <div class="label">
            <div class="fd">
                <label for="group">新增團務資料：</label>
                <input type="text" name="gname" placeholder="品項">
                <input type="text" name="amount" placeholder="數量">
                <input type="text" name="fettle" placeholder="貨況">
                <input type="text" name="date" placeholder="官方預計發售日">
                <input type="text" name="NTD" placeholder="金額">
                <br>
                <button id="g" type="submit" name="addgdata">新增團務資料</button>
                <button id="g" type="submit" name="editgdata">修改團務資料</button>
            </div>
            <br></br>
            <div class="fd">
                <label for="claim">新增認領資料：</label>
                <input type="text" name="role" placeholder="角色">
                <input type="text" name="claimant" placeholder="認領人">

                <br>
                <button id="g" type="submit" name="addcdata">新增認領資料</button>
                <button id="g" type="submit" name="editcdata">修改認領資料</button>
            </div>
        </div>

        <br><br></br>

    </form>

    <hr>

    <div id="tableDataContainer"></div>
</body>