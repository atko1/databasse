<?php
session_start();
if (isset($_SESSION['member'])) {
    $memberID = $_SESSION['member']['memberID'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $birthday = $_POST['birthday'];
        $phone = $_POST['phone'];
        $course = $_POST['course'];

        $conn = new mysqli('localhost', 'root', '', 'gym_management');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE member SET name='$name', age='$age', birthday='$birthday', phone='$phone', course='$course' WHERE memberID='$memberID'";

        if ($conn->query($sql) === TRUE) {
            echo "Member updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>
