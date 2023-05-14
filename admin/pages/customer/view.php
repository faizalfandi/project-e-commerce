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
$sql = "SELECT * FROM customer WHERE id=?;";
$st = $conn->prepare($sql);

// Menjalankan query dengan parameter id yang telah didapatkan sebelumnya
$st->execute([$_id]);

// Mengambil hasil query dan menyimpannya ke dalam variabel $row
$row = $st->fetch();
?>

<!-- Menampilkan data customer dalam bentuk tabel -->
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>Name</td>
                    <td>
                        <?= $row['name'] ?>
                    </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <?= $row['gender'] ?>
                    </td>
                </tr>
                <tr>
                    <td>phone</td>
                    <td>
                        <?= $row['phone'] ?>
                    </td>
                </tr>
                <tr>
                    <td>email</td>
                    <td>
                        <?= $row['email'] ?>
                    </td>
                </tr>
                <tr>
                    <td>address</td>
                    <td>
                        <?= $row['address'] ?>
                    </td>
                </tr>
                <tr>
                    <td>card_id</td>
                    <td>
                        <?= $row['card_id'] ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>