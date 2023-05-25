<?php
if($_POST){
    $id_produk=$_POST['id_produk'];
    $nama_produk=$_POST['nama_produk'];
    $deskripsi=$_POST['deskripsi'];
    $harga=$_POST['harga'];
    $kategori=$_POST['kategori'];
    $foto=$_POST['foto'];

    $ekstensi =  array('png','jpg','jpeg','gif','JPG');
    $filename = $_FILES['foto_produk']['name'];
    $ukuran = $_FILES['foto_produk']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if(empty($nama_produk)){
        echo "<script>alert('nama produk tidak boleh kosong');location.href='tambah_produk.php';</script>";
    } elseif(empty($deskripsi)){
        echo "<script>alert('deskripsi tidak boleh kosong');location.href='tambah_produk.php';</script>";
    } elseif(empty($harga)) {
        echo "<script>alert('harga tidak boleh kosong');location.href='tambah_produk.php';</script>";
    } 
    else {
        include "koneksitoko.php";
        if(empty($deskripsi)){
            $update=mysqli_query($conn,"update produk set nama_produk='".$nama_produk."',deskripsi='".$deskripsi."', harga='".$harga."' " ) or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update produk');location.href='tampil_produk.php';</script>";
            } else {
                echo "<script>alert('Gagal update produk');location.href='ubah_produk.php?id_produk=".$id_produk."';</script>";
            }
        } else {
            if($ukuran < 1044070 and $filename != ''){		
                
                unlink($foto);
                move_uploaded_file($_FILES['foto_produk']['tmp_name'], 'foto produk/'.''.$filename);
                $xx =$filename;
            }else{
                $xx =$foto;
            }
            $update=mysqli_query($conn,"update produk set nama_produk='".$nama_produk."',deskripsi='".$deskripsi."', harga='".$harga."', foto='".$xx."' 
            where id_produk ='". $id_produk. "' ") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update produk');location.href='home.php';</script>";
            } else {
                echo "<script>alert('Gagal update produk');location.href='ubah_produk.php?id_produk=".$id_produk."';</script>";
            }
        }
        
    } 
}
?>