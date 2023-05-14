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
    // ambil data `card` berdasarkan id
    $sql = "SELECT * FROM `card` WHERE id=?";
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
                <label for="code" class="col-4 col-form-label">code</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="code" name="code" type="text" class="form-control" value="<?php if (isset($row['code']))
                            echo $row['code']; ?>">
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
                <label for="discount" class="col-4 col-form-label">discount</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="discount" name="discount" type="text" class="form-control" value="<?php if (isset($row['discount']))
                            echo $row['discount']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="member_fee" class="col-4 col-form-label">member_fee</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="member_fee" name="member_fee" value="<?php if (isset($row['member_fee']))
                            echo $row['member_fee']; ?>" type="text" class="form-control">
                    </div>
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