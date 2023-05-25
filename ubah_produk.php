<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
    <style>
        * {
            margin: 10px;
        }
    </style>
</head>

<body>
    <?php
    include "koneksitoko.php";
    $qry_get_produk = mysqli_query($conn, "select * from produk where id_produk = '" . $_GET['id_produk'] . "'");
    $dt_produk = mysqli_fetch_array($qry_get_produk);
    ?>
    <div class="col-md rounded bg-light" style="box-shadow: 4px 4px 5px -4px;padding:10px">
        <h3>Ubah Produk</h3>
        <form action="proses_ubah_produk.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_produk" value="<?= $dt_produk['id_produk'] ?>">
            Nama Produk :
            <input type="text" name="nama_produk" value="<?= $dt_produk['nama_produk'] ?>" class="form-control">
            Deskripsi :
            <textarea name="deskripsi" class="form-control" rows="4"><?= $dt_produk['deskripsi'] ?></textarea>
            Harga :
            <input type="number" name="harga" value="<?= $dt_produk['harga'] ?>" class="form-control">
            Foto Produk :
            <img src="foto produk/<?= $dt_produk['foto'] ?>" alt="" width="100px">
            <input type="hidden" name="foto" value="<?= $dt_produk['foto'] ?>">
            <input type="file" name="foto_produk" value="Tambah Produk" class="form-control">
            <input type="submit" name="simpan" value="Ubah Produk" class="btn btn-dark mt-3">
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>