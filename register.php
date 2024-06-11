<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 獲取表單數據
    $name = $_POST['name'];
    $age = $_POST['age'];
    $birthday = $_POST['birthday'];
    $phone = $_POST['phone'];
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

    // 插入數據的 SQL 語句
    $sql = "INSERT INTO member (membeerID, name, age, birthday, phone) VALUES (?, ?, ?, ?, ?)";
    $params = array($membeerID, $name, $age, $birthday, $phone);

    // 執行 SQL 語句
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "New member registered successfully";
    }

    // 關閉連接
    sqlsrv_close($conn);
}
?>
