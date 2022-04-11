<?php
include "class/index_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/admin_class.php');
Session::init();
$user = new index();
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $passwords = md5($_POST['passwords']);
	$check_user = $user ->check_user($username,$passwords);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CALA - Login</title>
    <link rel="stylesheet" href="../css/login.css" />
  </head>
  <body>
    <div class="center">
    <span style="color:red; font-family: 'Bona Nova', serif;"><?php
            if(isset($check_user)){ echo $check_user;}
            ?></span>
      <h1>Login</h1>
      <form action=""  method="post">
        <div class="txt_field">
          <input type="text" name="username" required />
          <span></span>
          <label for="">User Name</label>
        </div>
        <div class="txt_field">
          <input type="password" name="passwords" required />
          <span></span>
          <label for="">Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <div class="submit"><input type="submit" name="dangnhap" value="Login" /></div>
        <div class="signup_link">
          Not a member? <a href="/calashop/register.php">Signup</a>
        </div>
      </form>
    </div>
  </body>
  <style>
      body {
  width: 100%;
  margin: 0;
  padding: 0;
  font-family: montserrat;
  background: linear-gradient(120deg, #00bfff, #00008b);
  height: 100vh;
  overflow: hidden;
}

.center {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 400px;
  background: white;
  border-radius: 10px;
}

.center h1 {
  text-align: center;
  padding: 0 0 20px 0;
  border-bottom: 1px solid silver;
}

.center form {
  padding: 0 40px;
  box-sizing: border-box;
}

form .txt_field {
  position: relative;
  border-bottom: 2px solid #adadad;
  margin: 30px 0;
}

.txt_field input {
  width: 100%;
  padding: 0 5px;
  height: 40px;
  font-size: 16px;
  border: none;
  background: none;
  outline: none;
}

.txt_field label {
  position: absolute;
  top: 50%;
  left: 5px;
  color: #adadad;
  transform: translateY(-50%);
  font-size: 16px;
  pointer-events: none;
  transition: 0.5s;
}

.txt_field span::before {
  content: "";
  position: absolute;
  top: 40px;
  left: 0;
  width: 0%;
  height: 2px;
  background: #2691d9;
  transition: 0.5s;
}

.txt_field input:focus ~ label,
.txt_field input:valid ~ label {
  top: -5px;
  color: #2691d9;
}

.txt_field input:focus ~ span::before,
.txt_field input:valid ~ span::before {
  width: 100%;
}

.pass {
  margin: -5px 0 20px 5px;
  color: #a6a6a6;
  cursor: pointer;
}

.pass:hover {
  text-decoration: underline;
}

.submit input {
  width: 100%;
  height: 50px;
  border: 1px solid;
  background: #2691d9;
  border-radius: 25px;
  font-size: 18px;
  color: #e9f4fb;
  font-weight: 700;
  cursor: pointer;
  outline: none;
}

.submit input:hover {
  border-color: #2691d9;
  transition: 0.5s;
}

.signup_link {
  margin: 30px 0;
  text-align: center;
  font-size: 16px;
  color: #666666;
}

.signup_link a {
  color: #2691d9;
  text-decoration: none;
}

.signup_link a:hover {
  text-decoration: underline;
}

  </style>
</html>
