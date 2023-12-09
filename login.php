<?php
	@ob_start();
	session_start();
	if(isset($_POST['proses'])){
		require 'config.php';
			
		$user = strip_tags($_POST['user']);
		$pass = strip_tags($_POST['pass']);

		$sql = 'select member.*, login.user, login.pass from member inner join login on member.id_member = login.id_member where user = ? and pass = md5(?)';
		$row = $config->prepare($sql);
		$row -> execute(array($user,$pass));
		$jum = $row -> rowCount();
		if($jum > 0){
			$hasil = $row -> fetch();
			$_SESSION['admin'] = $hasil;
			echo '<script>alert("Login Sukses");window.location="index.php"</script>';
		}else{
			echo '<script>alert("Login Gagal");history.go(-1);</script>';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword">

  <title>Login</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <!-- External CSS -->
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="/Web-Apotik/assets/img/pic/logo.jpg" />
  <link href="assets/css/style-responsive.css" rel="stylesheet">

  <style>
    body {
      background-image: url(assets/img/pic/obat.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    #login-page {
      padding-top: 3pc;
    }

    .form-login-heading {
      text-align: center;
    }

    .login-wrap {
      text-align: center;
    }

    .form-control {
			background-color: rgba(255, 255, 255, 0.5); /* semi-transparent white background */
			border: 1px solid #000; /* set a contrasting border color */
			color: #000; /* set text color to black */
		}

		.form-control:focus {
			border-color: #4285f4;
			box-shadow: none;
		}

    .btn-primary {
      background-color: #4285f4; /* Google Blue */
      border: 1px solid #4285f4;
    }

    .btn-primary:hover {
      background-color: #357ae8; /* Google Dark Blue */
      border: 1px solid #357ae8;
    }
  </style>
</head>
<body>
  <div id="login-page">
    <div class="container">
      <form class="form-login" method="POST">
        <h2 class="form-login-heading">Login</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" name="user" placeholder="Username" autofocus>
          <br>
          <input type="password" class="form-control" name="pass" placeholder="Password">
          <br>
          <button class="btn btn-primary btn-block" name="proses" type="submit"><i class="fa fa-lock"></i> Login</button>
        </div>
      </form>
    </div>
  </div>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>


