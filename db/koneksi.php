<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'pariwisata_db';

$conn = new mysqli($server, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi ke db gagal " . $conn->connect_error);
}