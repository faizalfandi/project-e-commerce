<?php
require_once '../fungsi/koneksi.php';
require_once '../fungsi/Produk.php';
?>

<?php
    $_id = $_GET['id'];
    $sql = "SELECT * FROM produk WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_id]);
    $row = $stmt->fetch();
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS Boostrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;1,400;1,700&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="../css/mycss.css">
    <!-- My Js -->

</head>

<body>
    <!-- Container -->
    <div class="main-container">
        <!-- Header -->
        <nav class="navbar navbar-expand-lg navbar-light header">
            <div class="container-fluid col-12">
                <div class="col-2">
                    <div class="d-flex align-items-center logo" href="#">
                        <img src="" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                        <h4 class="d-inline-block align-text-top">DOMAINBOOK</h4>
                    </div>

                </div>

                <div class="col-6">
                    <form class="d-flex mx-auto my-2 my-lg-0">
                        <input id="search" class="form-control search-box" type="search" placeholder="Search" aria-label="Search">
                        <div class="header-button1">
                            <button class="icon-header btn btn-light justify-content-end me-2" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                        </div>
                        </button>
                        <div class="header-button2">
                            <button class="btn  btn-outline-secondary justify-content-end" type="button">
                                <i class="fa fa-shopping-cart me-1"></i>
                            </button>
                        </div>
                    </form>

                </div>

                <div class="d-flex div-tombol">
                    <button class="tombol btn btn-outline-secondary me-2 align-self-center mb-1" type="button">Login</button>
                    <button class="tombol btn  btn-outline-secondary align-self-center" type="button">Sign Up</button>
                </div>
            </div>
        </nav>

        <div class="container-content d-flex justify-content-start">
            <!-- Sidebar  -->
            <div class="sidebar col-lg-6" style="width:36rem;">

                <!-- Sidebar Header -->

                <div class="card" style="width: auto;">
                    <div class="card-body">
                        <h5 class="card-title">Detail Produk</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Deskripsi Produk</h6>
                        <p class="card-text" style="font-size: small;">
                            <?= $row['deskripsi'] ?>
                        </p>
                </div>

                    <div id="carouselExampleCaptions" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../assets/img/jjk0.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Manga Jujutsu Kaisen 0</h5>
                                    <p>Cerita kembali sebelum yuji masuk ke akademi jujutsu. Menceritakan Kisah dari senpai tahun ke-2 yuuji yaitu Okkotsu Yuta</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="../assets/img/jjk1.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Manga Jujutsu Kaisen 1</h5>
                                    <p>Yuji pertama kali bertemu dengan orang aneh yang mencari sebuah benda terkutuk</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="../assets/img/jjk2.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Manga Jujutsu Kaisen 2</h5>
                                    <p>Yuji memasuki Sekolah jujutsu dan bertemu guru yang hebat</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

            </div>

            <!-- content -->
            <section class="py-5 col-lg-6 me-2" style="padding-left: 3rem;">
                <div class="container">
                    <div class="row gx-5">
                        <aside class="col-lg-6">
                            <div class="border rounded-4 mb-3 d-flex justify-content-center">
                                <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big.webp">
                                    <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="../assets/img/<?= $row['nama'] ?>.jpg" />
                                </a>
                            </div>
                            <!-- thumbs-wrap.// -->
                            <!-- gallery-wrap .end// -->
                        </aside>
                        <main class="col-lg-6">
                            <div class="ps-lg-3">
                                <h4 class="title text-dark">
                                    <?= $row['nama'] ?> <br />

                                </h4>
                                <div class="d-flex flex-row my-3">
                                    <div class="text-warning mb-1 me-2">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span class="ms-1">
                                            4.5
                                        </span>
                                    </div>
                                    <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 orders</span>
                                    <span class="text-success ms-2"><?= $row['stok'] ?> in stock</span>
                                </div>

                                <div class="mb-3">
                                    <span class="h5">RP.<?= $row['harga_jual'] ?></span>
                                    <span class="text-muted">/ Book</span>
                                </div>


                                <hr />

                                <div class="row mb-4">
                                    <div class="col-md-4 col-6">
                                        <label class="mb-2">Kode</label>
                                        <span class="text-mutted" ><?= $row['kode'] ?></span>
                                    </div>
                                    <!-- col.// -->
                                    <div class="col-md-4 col-6 mb-3">
                                        <label class="mb-2 d-block">ID Produk</label>
                                        <span class="text-mutted" ><?= $row['id'] ?></span>
                                        <div class="input-group mb-3" style="width: 170px;">
                                        </div>
                                    </div>
                                </div>
                                <a href="form_pesanan.php?id=<?= $row['id']?>" class="btn btn-warning shadow-0"> Beli Sekarang </a>
                                <a href="../index.php" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Gak Dulu </a>
                            </div>
                        </main>

                        <br>

                        <h3><span class="badge bg-secondary">Produk Mirip Lainnya</span></h3>

                        <br>

                        <?php 
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)):

                            
                        ?>
                        <div class="list-produk d-flex flex-wrap justify-conten">
                            <div class="card" style="width: 18rem; ">
                                <img src="..\assets\img\<?= $row['nama'] ?>.jpg" class="card-img-top" alt="produk1">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $row['nama'] ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">RP<?= $row['harga_jual'] ?></h6>
                                    <i class="fa fa-star" style="color: gold"></i><i class="fa fa-star" style="color: gold"></i><i class="fa fa-star" style="color: gold"></i><i class="fa fa-star" style="color: gold"></i><i class="fa fa-star" style="color: gold"></i>
                                    <br>
                                    <a href="page/detail_produk.php?id=<?= $row['id'] ?>" class="btn btn-primary mt-2">Lihat Detail</a>
                                </div>
                            </div>

                        </div>

                        <?php 
                            endwhile;
                        ?>

                    </div>
                </div>
            </section>
            <!-- content -->
        </div>
    </div>
</body>

</html>