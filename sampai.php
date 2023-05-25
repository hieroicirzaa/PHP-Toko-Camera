<?php 
if($_GET['id']){
    include "koneksitoko.php";
    $id_transaksi=$_GET['id'];
    $cek_terlambat=mysqli_query($conn, "select * from transaksi where id_transaksi = '".$id_transaksi."' ");
    $dt_bayar=mysqli_fetch_array($cek_terlambat);
    if(strtotime($dt_bayar['tgl_sampai'])>=strtotime(date('Y-m-d'))){
        $denda=0;
    } else{
        $harga_denda_perhari=5000;
        $tanggal_sampai = new DateTime();
        $tgl_harus_sampai = new DateTime($dt_bayar['tgl_sampai']); 
        $selisih_hari = $tanggal_sampai->diff($tgl_harus_sampai)->d;

    }
    mysqli_query($conn, "insert into produk_sampai (id_transaksi, tgl_sampai,denda) value('".$id_transaksi."','".date('Y-m-d')."','".$denda."')");
    header('location: histori_pembelian.php');
}
