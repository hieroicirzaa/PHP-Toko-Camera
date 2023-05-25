<?php
$conn=mysqli_connect('localhost','root','','toko_onlinee');
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
} else {
    printf("");
}
?>