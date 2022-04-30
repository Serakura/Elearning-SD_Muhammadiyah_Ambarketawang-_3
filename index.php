<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="./style.css" rel="stylesheet">
  <title>Form Login</title>

</head>

<body class="test" style="background-color: #4e73df;">

  <div class="container shadow mt-5" style="width:380px;background-color:white; border:2px solid black; border-radius:25px;">
    <div class="d-flex justify-content-center mt-4 mb-2">
      <img src="./assets/logo_sekolah.jpg" alt="" style="width: 150px; height:150px; font-size:100px;">
    </div>
    <form class="mt-3" action="./function/funct_login.php" method="POST">
      <div class="mb-3">
        <label for="username" class="form-label">Nomor Induk Siswa / Nomor Identitas Pegawai</label>
        <input name="username" type="text" class="form-control" id="username" aria-describedby="username" required autofocus>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required autofocus>
      </div>
      <div class="d-flex justify-content-center mt-4 mb-2">
        <button type="submit" class="btn btn-primary mb-2 px-4 py-2" name="login">Login</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>