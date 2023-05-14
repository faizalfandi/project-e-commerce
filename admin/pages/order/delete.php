<?php
require_once '../../../db_connection.php';

$_id = $_GET['id'];

$sql = "DELETE FROM `order` WHERE id = ?";

$st = $conn->prepare($sql);

$st->execute([$_id]);

header('location:list.php');

?>