<?php
function connection()
{
    $conn = new mysqli('localhost', 'root', '', 'learning');
    if ($conn->connect_error) {
        die("kết nối thất bại" . $conn->connect_error);
    }
    return $conn;

}
function disconnect($conn)
{
    if (isset($conn)) {
        $conn->close();
    }
}
?>