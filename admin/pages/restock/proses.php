<?php
require '../../../config.php';

// database
require DIR_ROOT . 'db_connection.php';

// Ambil data dari form
$_restock_number = $_POST['restock_number'];
$_date = $_POST['date'];
$_qty = $_POST['qty'];
$_price = $_POST['price'];
$_supplier_id = $_POST['supplier_id'];

$_proses = $_POST['proses'];

// Simpan data ke dalam array
$ar_data[]=$_restock_number;
$ar_data[]=$_date;
$ar_data[]=$_qty;
$ar_data[]=$_price;
$ar_data[]=$_supplier_id;

// Cek aksi yang dilakukan: Simpan atau Update
if($_proses == "Simpan"){
    // Jika Simpan, buat SQL INSERT
    $sql = "INSERT INTO `restock` (`restock_number`,`date`,`qty`,`price`,`supplier_id`) VALUES (?,?,?,?,?)";
}else if($_proses == "Update"){
    // Jika Update, tambahkan ID ke array dan buat SQL UPDATE
    $ar_data[]=$_POST['id'];
    $sql = "UPDATE `restock` SET `restock_number`=?,`date`=?,`qty`=?,`price`=?,`supplier_id`=? WHERE `id`=?";
}

// Jika ada perintah SQL, jalankan perintah prepare dan execute dengan array data
if(isset($sql)){
    $st = $conn->prepare($sql);
    $st->execute($ar_data);
}

// Redirect ke halaman daftar produk
header('location:list.php');
?>
