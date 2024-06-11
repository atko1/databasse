<?php
session_start();
if (isset($_SESSION['member'])) {
    $memberID = $_SESSION['member']['memberID'];

    $conn = new mysqli('localhost', 'root', '', 'gym_management');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM member WHERE memberID='$memberID'";

    if ($conn->query($sql) === TRUE) {
        echo "Member deleted successfully";
        session_destroy();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
