<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Dinas Pariwisata Tanah Laut</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/css/styleLogin.css"> 
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/fantala.png">
  <style type="text/css">
  
  body {
  background-image: url('assets/art2.png');
  background-repeat: no-repeat;
  background-size: cover;
	position: static;
	
  }
</style>
</head>
<body style="background-color: #666666;">
<h2 style="text-align: center; text-transform: uppercase; -webkit-text-stroke: 1px black; margin-top340px; margin-bottom: -70px; color: white; font-family: sans-serif;">
APLIKASI PENGARSIPAN SURAT MASUK DAN SURAT KELUAR BERBASIS WEBSITE <br> PADA DINAS PARIWISATA TANAH LAUT
</h2>

  <div id="card">

    <div id="card-content">
		<div>
		<center><img src="<?php echo base_url('assets/fantala.png')?>" alt="" width="90%" style="margin-top:0px; float:top;"></center>
		</div>
      <div id="card-title">
        <h2>LOGIN</h2>
        <div class="underline-title"></div>
      </div>
      <form method="post" action="<?php echo site_url('login')?>" class="form">
        <label for="username" style="padding-top:10">
            Username
          </label>
        <input id="username" class="form-content" type="text" name="username" autocomplete="on" required />
        <div class="form-border"></div>
        <label for="user-password" style="padding-top:30px">Password
          </label>
        <input id="user-password" class="form-content" type="password" name="password" required />
        <div class="form-border"></div>
        <!-- <a href="#">
          <legend id="forgot-pass">Forgot password?</legend>
        </a> -->
        <input id="submit-btn" style="color: black;" type="submit" name="submit" value="LOGIN" />
        <!-- <a href="#" id="signup">Don't have account yet?</a> -->
      </form>
    </div>
  </div>
</body>

</html>
