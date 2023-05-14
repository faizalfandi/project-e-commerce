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
    // ambil data product berdasarkan id
    $sql = "SELECT * FROM `product` WHERE id=?";
    $st = $conn->prepare($sql);
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
                <label for="sku" class="col-4 col-form-label">sku</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="sku" name="sku" type="text" class="form-control" value="<?php if (isset($row['sku']))
                            echo $row['sku']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-4 col-form-label">name</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="name" name="name" type="text" class="form-control" value="<?php if (isset($row['name']))
                            echo $row['name']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="purchase_price" class="col-4 col-form-label">purchase_price</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="purchase_price" name="purchase_price" value="<?php if (isset($row['purchase_price']))
                            echo $row['purchase_price']; ?>" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="sell_price" class="col-4 col-form-label">sell_price</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="sell_price" name="sell_price" value="<?php if (isset($row['sell_price']))
                            echo $row['sell_price']; ?>" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="stock" class="col-4 col-form-label">stock</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="stock" name="stock" value="<?php if (isset($row['stock']))
                            echo $row['stock']; ?>" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="min_stock" class="col-4 col-form-label">min_stock</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="min_stock" name="min_stock" value="<?php if (isset($row['min_stock']))
                            echo $row['min_stock']; ?>" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="product_type_id" class="col-4 col-form-label">product_type</label>
                <div class="col-8">
                    <?php
                    $sql = "SELECT * FROM `product_type`";
                    $rs = $conn->query($sql);
                    ?>
                    <select id="product_type_id" name="product_type_id" class="form-control form-control-sm">
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
                <label for="restock_id" class="col-4 col-form-label">restock</label>
                <div class="col-8">
                    <?php
                    $sql = "SELECT * FROM `restock`";
                    $rs = $conn->query($sql);
                    ?>
                    <select id="restock_id" name="restock_id" class="form-control form-control-sm">
                        <?php
                        foreach ($rs as $row) {
                            ?>
                            <option value="<?= $row['id'] ?>"><?= $row['restock_number'] ?></option>
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