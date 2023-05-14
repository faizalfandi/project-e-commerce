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
    // ambil data vendor berdasarkan id
    $sql = "SELECT * FROM vendor WHERE id=?";
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
                <label for="name" class="col-4 col-form-label">name</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="name" name="name" type="text" class="form-control" value="<?php if (isset($row['name']))
                            echo $row['name']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="gender" class="col-4 col-form-label">gender</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="gender" name="gender" type="text" class="form-control" value="<?php if (isset($row['gender']))
                            echo $row['gender']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-4 col-form-label">phone</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="phone" name="phone" value="<?php if (isset($row['phone']))
                            echo $row['phone']; ?>" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-4 col-form-label">email</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="email" name="email" value="<?php if (isset($row['email']))
                            echo $row['email']; ?>" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-4 col-form-label">address</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="address" name="address" value="<?php if (isset($row['address']))
                            echo $row['address']; ?>" type="text" class="form-control">
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