<?php
$username = 'root';
$password = '';
$database = 'pbl2';
try {
    $db = new mysqli('localhost', $username, $password, $database); // ini yang dipake buat query
    if ($db->connect_error) {
        die('Connection failed: ' . $db->connect_error);
    }
} catch (Exception $e) {
    die($e->getMessage());
}
?>