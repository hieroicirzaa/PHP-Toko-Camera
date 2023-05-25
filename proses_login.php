<?php 
    if($_POST){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $level=$_POST['level'];
        if(empty($username)){
            echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
        } else {
            include "koneksitoko.php";
            $qry_login=mysqli_query($conn,"select * from user where username = '".$username."' and password = '".$password."' and level = '".$level."'");
            if(mysqli_num_rows($qry_login)>0){
                $dt_login=mysqli_fetch_array($qry_login);
                session_start();

                if($dt_login['level']=="petugas"){
                    $_SESSION['id_user']=$dt_login['id_user'];
                    $_SESSION['nama_user']=$dt_login['nama_user'];
                    $_SESSION['level']= "petugas";
                    $_SESSION['status_login']=true;
                    header("location: home.php");
                }else if($dt_login['level'] == "pelanggan"){
                    $_SESSION['id_user']=$dt_login['id_user'];
                    $_SESSION['nama_user']=$dt_login['nama_user'];
                    $_SESSION['level']= "pelanggan";
                    $_SESSION['status_login']=true;
                    header("location: home.php");
                }
            } else {
                echo "<script>alert('Username dan Password tidak benar');location.href='login.php';</script>";
            }
        }
    }
?>
