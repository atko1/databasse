<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 獲取表單數據
    $name = $_POST['name'];
    $membeerID = $_POST['membeerID'];

    // SQL Server 連接配置
    $serverName = "LAPTOP-VRRV2UPA\SQLEXPRESS";
    $connectionOptions = array(
        "Database" => "your_database_name",
        "Uid" => "your_username",
        "PWD" => "your_password"
    );

    // 建立連接
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // 查詢數據的 SQL 語句
    $sql = "SELECT * FROM member WHERE membeerID = ? AND name = ?";
    $params = array($membeerID, $name);

    // 執行 SQL 語句
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // 檢查是否找到匹配的記錄
    if (sqlsrv_has_rows($stmt)) {
        echo "登入成功！";
    } else {
        echo "登入失敗：ID 或姓名不正確。";
    }

    // 關閉連接
    sqlsrv_close($conn);
}
?>
