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
$sql = "SELECT * FROM `order` WHERE id=?;";
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
                    <td>order_number</td>
                    <td>
                        <?= $row['order_number'] ?>
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
                    <td>total_price</td>
                    <td>
                        <?= $row['total_price'] ?>
                    </td>
                </tr>
                <tr>
                    <td>customer_id</td>
                    <td>
                        <?= $row['customer_id'] ?>
                    </td>
                </tr>
                <tr>
                    <td>product_id</td>
                    <td>
                        <?= $row['product_id'] ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>