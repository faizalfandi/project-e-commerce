<?php
require '../../../config.php';

// database
require DIR_ROOT . 'db_connection.php';


include_once ADMIN_TEMPLATES . 'header.php';

?>



<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Striped Table</h4>
            <p class="card-description">
                <a href="form.php" type="button" class="btn btn-gradient-danger btn-icon-text">
                    <i class="mdi mdi-upload btn-icon-prepend"></i> tambah data </a>
                </code>
            </p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>code </th>
                        <th>name </th>
                        <th>discount </th>
                        <th>member_fee </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT * FROM `card`;";
                    $st = $conn->query($sql);
                    foreach ($st as $row) {
                        ?>

                        <tr>
                            <td>
                                <?= $row['code'] ?>
                            </td>
                            <td>
                                <?= $row['name'] ?>
                            </td>
                            <td>
                                <?= $row['discount'] ?>
                            </td>
                            <td>
                                <?= $row['member_fee'] ?>
                            </td>
                        </tr>

                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php

include_once ADMIN_TEMPLATES . 'footer.php';
?>