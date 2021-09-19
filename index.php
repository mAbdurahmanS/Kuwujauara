<?php
@session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | KUWU JUARA</title>

    <link rel="stylesheet" href="css/login.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <?php
        if(@$_GET['page']=="simpan"){
			echo '<script type="text/javascript">
			alert("Register Berhasil \n Silahkan anda login !");
			</script>';
		}
    ?>

  <div class="container">
    
    <div class="header">
      <h2>Login</h2>
    </div>

    <form class="form" method="post" action="controllers/proses_log.php" enctype="multipart/form-data">
      <div class="form-control">
        <input type="text" placeholder="Username / No Telpon / NIK" id="username" name="username">
        <i class='bx bxs-check-circle' ></i>
        <i class='bx bxs-x-circle'></i>
        <small>Error message</small>
      </div>

      <div class="form-control">
        <input type="password" placeholder="Passsword" name="password" id="password">
        <i class='bx bxs-check-circle' ></i>
        <i class='bx bxs-x-circle'></i>
        <small>Error message</small>
      </div>

      <button type="submit">Submit</button>
    </form>
  </div>
  



	<script src="js/login.js"></script>
</body>
</html>