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
                        <th>order_number </th>
                        <th>date </th>
                        <th>qty </th>
                        <th>total_price </th>
                        <th>customer_id </th>
                        <th>product_id </th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT * FROM `order`;";
                    $st = $conn->query($sql);
                    foreach ($st as $row) {
                        ?>

                        <tr>
                            <td>
                                <?= $row['order_number'] ?>
                            </td>
                            <td>
                                <?= $row['date'] ?>
                            </td>
                            <td>
                                <?= $row['qty'] ?>
                            </td>
                            <td>
                                <?= $row['total_price'] ?>
                            </td>
                            <td>
                                <?= $row['customer_id'] ?>
                            </td>
                            <td>
                                <?= $row['product_id'] ?>
                            </td>
                            <td>
                                <a href="view.php?id=<?= $row['id'] ?>" type="button" class="btn btn-primary btn-fw">detail</a>
                                <a href="form.php?id=<?= $row['id'] ?>" type="button" class="btn btn-primary btn-fw">update</a>
                                <a href="delete.php?id=<?= $row['id'] ?>" type="button" class="btn btn-primary btn-fw">delete</a>    
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