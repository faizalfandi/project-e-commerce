<?php
require '../../../config.php';

// database
require DIR_ROOT . 'db_connection.php';


include_once ADMIN_TEMPLATES . 'header.php';

?>

<?php
// Mendapatkan nilai id dari parameter GET
$_id = $_GET['id'];

// Membuat query SQL untuk mengambil data customer dengan id tertentu
$sql = "SELECT * FROM restock_number WHERE id=?;";
$st = $conn->prepare($sql);

// Menjalankan query dengan parameter id yang telah didapatkan sebelumnya
$st->execute([$_id]);

// Mengambil hasil query dan menyimpannya ke dalam variabel $row
$row = $st->fetch() ;
?>

<!-- Menampilkan data customer dalam bentuk tabel -->
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>restock_number</td>
                    <td>
                        <?= $row['restock_number'] ?>
                    </td>
                </tr>
                <tr>
                    <td>date</td>
                    <td>
                        <?= $row['date'] ?>
                    </td>
                </tr>
                <tr>
                    <td>qty</td>
                    <td>
                        <?= $row['qty'] ?>
                    </td>
                </tr>
                <tr>
                    <td>price</td>
                    <td>
                        <?= $row['price'] ?>
                    </td>
                </tr>
                <tr>
                    <td>supplier_id</td>
                    <td>
                        <?= $row['supplier_id'] ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>