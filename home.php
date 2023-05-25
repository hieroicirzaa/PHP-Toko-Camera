<?php
include "header.php";
?>
<!doctype html>
<html class="htmlHome" lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Custom CSS -->
  <link href="style.css" rel="stylesheet">
</head>

<body>
  <div class="home">
  
    <center>
      <h1 style="font-family: selidon; color:cyan;" class="h1">Selamat datang <?= $_SESSION['level'] ?> <?= $_SESSION['nama_user'] ?> di website Hieroic Camera</h1>
    </center>


</body>
</div>

</html>
<?php
include "footer.php";
?>