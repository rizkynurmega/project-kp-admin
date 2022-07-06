<?php

session_start();

include 'config/app.php';

// button check click button login
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // username check
    $result = mysqli_query($db, "SELECT * FROM akun_admin WHERE username = '$username'");
    
    // after check username  
    if (mysqli_num_rows($result) == 1) {

        // then check password
        $hasil = mysqli_fetch_assoc($result);

        if (password_verify($password, $hasil['password'])) {
            // set session
            $_SESSION['login']       = true;
            $_SESSION['userID']      = $hasil['userID'];
            $_SESSION['namaLengkap'] = $hasil['namaLengkap'];
            $_SESSION['username']    = $hasil['username'];
            $_SESSION['role']        = $hasil['role'];

            header("Location: index.php");
            exit;
        }
    }
    // if fail
    $error = true;
}

?>



<!doctype html>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Login Admin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>
  
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form action="" method="POST">
    <img class="mb-4" src="assets/img/le casa bonita.png" alt="" width="150" height="150">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <?php if (isset($error)) : ?>
        <div class="alert alert-danger text-center">
            <b>Username atau Password yang Anda Masukkan Salah/Tidak Ada</b>
        </div>  
    <?php endif; ?>  

    <div class="form-floating">
      <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" required>
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>


    <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Login</button>
    <p class="mt-5 mb-3 text-muted">Copyright &copy; Le Casta Sonita <?= date('Y')?></p>
  </form>
</main>


    
  </body>
</html>
