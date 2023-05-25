<div class="bg_histori" >
<?php 
    // session_start();
     include "header.php";
    $id = $_SESSION['id_user'];
?>
           
<h2 style="font-family: selidon; margin-top: 2%;">Histori Pembelian Produk</h2><br>
<table class="table table-hover table-striped">
    <thead>
        <style>
            </style>
        <th>NO</th> <th>Nama Pembeli</th><th>Checkout</th><th>Estimasi Sampai</th><th>Nama Produk</th><th>Status</th><th>Aksi</th>
    </thead>
    <tbody>
        <?php 
        include "koneksitoko.php";
        if($_SESSION['level']=="petugas"){
            $qry_histori=mysqli_query($conn,"select * from transaksi order by id_transaksi desc");
        }elseif($_SESSION['level']=="pelanggan"){
            $qry_histori=mysqli_query($conn,"select * from transaksi where id_user ='".$id."' order by id_transaksi desc");          
        }
        $no=0;
        while($dt_histori=mysqli_fetch_array($qry_histori)){
            $no++;
            //menampilkan produk yang dibeli
            $produk_dibeli="<ol>";
            $qry_produk=mysqli_query($conn,"select * from  detail_transaksi join produk on produk.id_produk=detail_transaksi.id_produk where id_transaksi = '".$dt_histori['id_transaksi']."'");
            while($dt_produk=mysqli_fetch_array($qry_produk)){
                $produk_dibeli.="<li>".$dt_produk['nama_produk']."</li>";
            }
            $produk_dibeli.="</ol>";
            //menampilkan status sudah kembali atau belum
            $qry_cek_sampai=mysqli_query($conn,"select * from produk_sampai where id_transaksi = '".$dt_histori['id_transaksi']."'");
            if(mysqli_num_rows($qry_cek_sampai)>0){
                $dt_sampai=mysqli_fetch_array($qry_cek_sampai);
                $denda="denda Rp. ".$dt_sampai['denda'];
                $status_sampai="<label class='alert alert-success'>Sudah sampai <br>";
                $button_sampai="";
            } else {
                $status_sampai="<label class='alert alert-danger'>Belum sampai</label>";
                $button_sampai="<a href='sampai.php?id=".$dt_histori['id_transaksi']."' class='btn btn-warning' onclick='return confirm(\"Apakah anda yakin?\")'>Sampai</a>";
            }
            
        ?>
              <?php 
                $qry_user=mysqli_query($conn,"select * from user where id_user ='".$dt_histori['id_user']."' ");
                $data_user=mysqli_fetch_array($qry_user);
            ?>         
            <tr>
                <td><?=$no?></td>
               
                <td><?=$data_user['nama_user']?></td>
                <td><?=$dt_histori['tgl_transaksi']?></td>
                <td><?=$dt_histori['tgl_sampai']?></td>
                <td><?=$produk_dibeli?></td>
                <td><?=$status_sampai?></td>
                <td><?=$button_sampai?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</div>
<div style="background-image: url(assets/film-near-photo-video-cameras.jpg);">
<?php 
    include "footer.php";
?>
</div>