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
                        <th>sku </th>
                        <th>name </th>
                        <th>purchase_price </th>
                        <th>sell_price </th>
                        <th>stock </th>
                        <th>min_stock </th>
                        <th>product_type_id</th>
                        <th>restock_id</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT * FROM `product`;";
                    $st = $conn->query($sql);
                    foreach ($st as $row) {
                        ?>

                        <tr>
                            <td>
                                <?= $row['sku'] ?>
                            </td>
                            <td>
                                <?= $row['name'] ?>
                            </td>
                            <td>
                                <?= $row['purchase_price'] ?>
                            </td>
                            <td>
                                <?= $row['sell_price'] ?>
                            </td>
                            <td>
                                <?= $row['stock'] ?>
                            </td>
                            <td>
                                <?= $row['min_stock'] ?>
                            </td>
                            <td>
                                <?= $row['product_type_id'] ?>
                            </td>
                            <td>
                                <?= $row['restock_id'] ?>
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