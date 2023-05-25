<div  style="background-image: url(assets/film-near-photo-video-cameras.jpg);" class="bgProduk">
<?php 
    include "header.php";
?>
<div>
<br><h2 style="font-family: selidon;"><center>Daftar Produk<center></h2><br>
<?php
    if($_SESSION['level'] == "petugas"){
        ?>
        <div style="margin-bottom: 3%;">
            <a href="tampil_produk.php" class="btn btn-primary">Daftar Produk</a>
            <a href="tambah_produk.php" class="btn btn-primary">Tambah Produk</a>
            <a href="tambah_user_petugas.php" class="btn btn-primary">Tambah Petugas</a>
        </div>
        <?php
    }
?>

<div class="row">
    <?php 
    include "koneksitoko.php";
    $qry_produk=mysqli_query($conn,"select * from produk");
    ?>

    <?php
        while($dt_produk=mysqli_fetch_array($qry_produk)){
    ?>
        <div class="col-md-3">
            <div class="card" style="margin-bottom: 4%;">
            <img src="foto produk/<?=$dt_produk['foto']?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?=$dt_produk['nama_produk']?></h5>
                <p class="card-text"><?=substr($dt_produk['deskripsi'], 0,20)?></p>
                <p class="card-text">IDR <?=substr($dt_produk['harga'], 0,20)?></p>
                <?php
                if($_SESSION['level'] == "petugas"){
                ?>
                <a href="ubah_produk.php?id_produk=<?=$dt_produk['id_produk']?>" class="btn btn-primary">Ubah</a>
                <a href="hapus_produk.php?id_produk=<?=$dt_produk['id_produk']?>" class="btn btn-danger">Hapus</a>
                <?php
                }
                ?>

            <?php

            if($_SESSION['level']=="pelanggan"){
                ?>
                    <a href="beli_produk.php?id_produk=<?=$dt_produk['id_produk']?>" class="btn btn-primary">beli</a>
                <?php
            }
            ?>
                
                
            </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
</div>
<?php 
    include "footer.php";
?>
</div>