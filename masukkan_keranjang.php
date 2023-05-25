<?php 
session_start();
$id = $_SESSION['id_user'];
    if($_POST){
        include "koneksitoko.php";
        
        $qry_get_produk=mysqli_query($conn,"select * from produk where id_produk = '".$_GET['id_produk']."'");
        $dt_produk=mysqli_fetch_array($qry_get_produk);
        $qry_user=mysqli_query($conn,"select * from user where id_user ='".$id."' ");
        $data_user=mysqli_fetch_array($qry_user);
        
        $_SESSION['cart'][]=array(
            'id_produk'=>$dt_produk['id_produk'],
            'nama_produk'=>$dt_produk['nama_produk'],
            'harga'=>$dt_produk['harga'],
            'qty'=>$_POST['jumlah_beli'],
            'nama_user'=>$data_user['nama_user']

        );
    }
    header('location: keranjang.php');
?>