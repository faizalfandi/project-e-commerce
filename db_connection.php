<?php
// $host = '127.0.0.1';
// $db = 'dbpos';
// $user = 'root';
// $pass = '';


$db = 'db_faiz22084ti';
$pass = '16930110222084';
$host = 'localhost';
$user = 'faiz22084ti';
$charset = 'utf8mb4';


$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$opt = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false,
];

$conn = new PDO($dsn, $user, $pass, $opt);
