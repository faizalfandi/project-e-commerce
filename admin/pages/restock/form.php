<?php
require '../../../config.php';

// database
require DIR_ROOT . 'db_connection.php';


include_once ADMIN_TEMPLATES . 'header.php';

?>

<?php
// cek apakah terdapat parameter id pada URL, jika ada maka dilakukan edit data
$_id = isset($_GET['id']) ? $_GET['id'] : null;
if (!empty($_id)) {
    // ambil data restock berdasarkan id
    $sql = "SELECT * FROM restock WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();
} else {
    // jika tidak ada parameter id pada URL, maka dianggap input data baru
    // inisialisasi variabel $row sebagai array kosong
    $row = [];
}
?>

<div class="card">
    <div class="card-body">
        <form method="POST" action="proses.php">
            <div class="form-group row">
                <label for="restock_number" class="col-4 col-form-label">restock_number</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="restock_number" name="restock_number" type="text" class="form-control" value="<?php if (isset($row['restock_number']))
                            echo $row['restock_number']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-4 col-form-label">date</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="date" name="date" type="text" class="form-control" value="<?php if (isset($row['date']))
                            echo $row['date']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="qty" class="col-4 col-form-label">qty</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="qty" name="qty" value="<?php if (isset($row['qty']))
                            echo $row['qty']; ?>" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-4 col-form-label">price</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="price" name="price" value="<?php if (isset($row['price']))
                            echo $row['price']; ?>" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="supplier_id" class="col-4 col-form-label">supplier_id</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="supplier_id" name="supplier_id" value="<?php if (isset($row['supplier_id']))
                            echo $row['supplier_id']; ?>" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="card_id" class="col-4 col-form-label">card</label>
                <div class="col-8">
                    <?php
                    $sql = "SELECT * FROM `card`";
                    $rs = $conn->query($sql);
                    ?>
                    <select id="card_id" name="card_id" class="form-control form-control-sm">
                        <?php
                        foreach ($rs as $row) {
                            ?>
                            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <?php
                    $button = (empty($_id)) ? "Simpan" : "Update";
                    ?>
                    <input type="submit" name="proses" type="submit" class="btn btn-primary" value="<?= $button ?>" />
                    <input type="hidden" name="id" value="<?= $_id ?>" />
                </div>
            </div>
        </form>
    </div>
</div>