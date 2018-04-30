<html lang="en-US">
  <head>

  <title>Project Web TA</title>
  <!-- Icon -->
  <link rel="icon" href="<?=base_url();?>assets/dist/img/logo.ico" type="image/ico">

    <meta charset="utf-8">

    <title>Login</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">

 <style type="text/css">
  * {
  box-sizing: border-box;
}

html {
  background: #E2E2E2;
}

body {
  background: #E2E2E2;
  margin: 0;
  padding: 0;
  font-family: 'Lato', sans-serif;
}

.login-form-wrap {
  background: -webkit-radial-gradient(center ellipse, #bdc3c7 0%, #bdc3c7 100%);
  background: radial-gradient(ellipse at center, #bdc3c7 0%, #bdc3c7 100%);
  border: 1px solid #bdc3c7;
  box-shadow: 0 1px #bdc3c7 inset, 0 0 10px 5px rgba(0, 0, 0, 0.1);
  border-radius: 5px;
  width: 360px;
  height: 380px;
  margin: 60px auto;
  padding: 50px 30px 0 30px;
  text-align: center;
}
.login-form-wrap h1 {
  margin: 0 0 50px 0;
  padding: 0;
  font-size: 26px;
  color: #fff;
}
.login-form-wrap h5 {
  margin-top: 40px;
}
.login-form-wrap h5 > a {
  font-size: 14px;
  color: #fff;
  text-decoration: none;
  font-weight: 400;
}

.login-form input[type="text"], .login-form input[type="password"] {
  width: 100%;
  border: 1px solid #314d89;
  outline: none;
  padding: 12px 20px;
  color: #34495e;
  font-weight: 400;
  font-family: 'Lato', sans-serif;
  cursor: pointer;
}
.login-form input[type="text"] {
  border-bottom: none;
  border-radius: 4px 4px 0 0;
  padding-bottom: 13px;
  box-shadow: 0 -1px 0 #E0E0E0 inset, 0 1px 2px rgba(0, 0, 0, 0.23) inset;
}
.login-form input[type="password"] {
  border-top: none;
  border-radius: 0 0 4px 4px;
  box-shadow: 0 -1px 2px rgba(0, 0, 0, 0.23) inset, 0 1px 2px rgba(255, 255, 255, 0.1);
}
.login-form input[type="submit"] {
  font-family: 'Lato', sans-serif;
  font-weight: 400;
  background: -webkit-linear-gradient(top, #e0e0e0 0%, #cecece 100%);
  background: linear-gradient(to bottom, #e0e0e0 0%, #cecece 100%);
  display: block;
  margin: 20px auto 0 auto;
  width: 100%;
  border: none;
  border-radius: 3px;
  padding: 8px;
  font-size: 17px;
  color: #636363;
  text-shadow: 0 1px 0 rgba(255, 255, 255, 0.45);
  font-weight: 700;
  box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.17), 0 1px 0 rgba(255, 255, 255, 0.36) inset;
}
.login-form input[type="submit"]:hover {
  background: #DDD;
}
.login-form input[type="submit"]:active {
  padding-top: 9px;
  padding-bottom: 7px;
  background: #C9C9C9;
}

 </style>

  </head>

  <body>
    <section class="login-form-wrap">
  <img src="<?=base_url();?>assets/dist/img/New-Logo-TA-2016.png" height="80" width="270">
  <h4>&nbsp</h4>
  <form class="login-form" method="post" action="<?=base_url('index.php/login/checklogin')?>">
    <label>
      <input type="text" name="nik" required placeholder="NIK">
    </label>
    <label>
      <input type="password" name="password" required placeholder="Password">
    </label>
    <input type="submit" value="Login" name="submit">
  </form>
  <!-- <h5><a href="#">Forgot password</a></h5> -->
</section>
  </body> 
</html>