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
$sql = "SELECT * FROM `card` WHERE id=?;";
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
                    <td>code</td>
                    <td>
                        <?= $row['code'] ?>
                    </td>
                </tr>
                <tr>
                    <td>name</td>
                    <td>
                        <?= $row['name'] ?>
                    </td>
                </tr>
                <tr>
                    <td>discount</td>
                    <td>
                        <?= $row['discount'] ?>
                    </td>
                </tr>
                <tr>
                    <td>member_fee</td>
                    <td>
                        <?= $row['member_fee'] ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>