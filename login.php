<!doctype html>
<html class="htmlLogin" lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Custom CSS -->
  <link href="style.css" rel="stylesheet">

  <title>Login Hieroic Camera</title>
</head>

<body class="bodyLogin">
  <div class="global-container">
    <div class="floating" id="kotak" class="card login-form" style="height: 500px;">
      <div class="card-body">
        <div style>
          <h1 class="card-title text-center">Hieroic Camera</h1>
        </div>
        <div class="card-text">
          <form action="proses_login.php" method="post">
            <form action="header.php" method="post">
              Username :
              <input type="text" name="username" value="" class="form-control">
              Password :
              <input type="password" name="password" class="form-control">
              Login Sebagai :
              <select name="level" class="form-control">
                <option></option>
                <option value="petugas">Petugas</option>
                <option value="Pelanggan">Pelanggan</option>
              </select><br>
              <div>
                <div >
                  <center><input type="submit" name="login" class="btn btn-success" value="LOGIN"></center>
                  <center>
                    <p style="padding-top: 30px ;">belum punya akun? <a href="tambah_user.php">Sign Up</a></p>
                  </center>
                </div>
              </div>
            </form>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>