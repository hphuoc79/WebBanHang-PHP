<!DOCTYPE html>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CALA - Sigup</title>
</head>
<body>

<div class="container">
<form method="post" action="register.php" class="form">

<h2>Đăng ký thành viên</h2>

<div class="txt_field">
    <input type="text" name="fullname" value="" required>
    <span></span>
    <label for="">Full Name</label>
</div>

<div class="txt_field">
    <input type="text" name="username" value="" required>
    <span></span>
    <label for="">User Name</label>
</div>

<div class="txt_field">
    <input type="password" name="passwords" value="" required/>
    <span></span>
    <label for="">Password</label>
</div>

<div class="txt_field">
    <input type="email" name="email" value="" required/>
    <span></span>
    <label for="">Email</label>
</div>

<div class="txt_field">
    <input type="text" name="phone" value="" required/>
    <span></span>
    <label for="">Phone</label>
</div>

<div class="submit"><input type="submit" name="dangky" value="Đăng Ký"/></div>

<?php require 'xuly.php';?>
</form>
</div>
<style>
    body {
  width: 100%;
  margin: 0;
  padding: 0;
  font-family: montserrat;
  background: linear-gradient(120deg, #434343, #00008b);
  height: 100vh;
  overflow: hidden;
}

.container {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 400px;
  background: white;
  border-radius: 10px;
}

.container h2 {
  text-align: center;
  padding: 0 0 20px 0;
  border-bottom: 1px solid silver;
}

.container form {
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

.submit input {
  width: 100%;
  height: 50px;
  margin-bottom: 50px;
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

</style>

</body>

</html>