<?php
    if($_GET['id_produk']){
        include "koneksitoko.php";
        $qry_hapus=mysqli_query($conn,"delete from produk where id_produk='".$_GET['id_produk']."'");
    if($qry_hapus){
        echo "<script>alert('Sukses hapus');location.href='produk.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus');location.href='produk.php';</script>";
}
}
?>