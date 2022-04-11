
<?php
header('Content-Type: text/html; charset=utf-8');
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', 'huuphuoc2208', 'secondhand_php') or die ('Lỗi kết nối'); mysqli_set_charset($conn, "utf8");

// Dùng isset để kiểm tra Form
if(isset($_POST['dangky'])){
    $fullname = trim($_POST['fullname']);
$username = trim($_POST['username']);
$passwords = trim(md5($_POST['passwords']));
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);


if (empty($fullname)) {
    array_push($errors, "Username is required"); 
}
if (empty($username)) {
array_push($errors, "Username is required"); 
}
if (empty($email)) {
array_push($errors, "Email is required"); 
}
if (empty($phone)) {
array_push($errors, "Password is required"); 
}
if (empty($passwords)) {
array_push($errors, "Two password do not match"); 
}

// Kiểm tra username hoặc email có bị trùng hay không
$sql = "SELECT * FROM member WHERE username = '$username' OR email = '$email'";

// Thực thi câu truy vấn
$result = mysqli_query($conn, $sql);

// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
if (mysqli_num_rows($result) > 0)
{
echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="register.php";</script>';

// Dừng chương trình
die ();
}
else {
$sql = "INSERT INTO member (fullname, username, passwords, email, phone) VALUES ('$fullname','$username','$passwords','$email','$phone')";
echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="index.php";</script>';

if (mysqli_query($conn, $sql)){
echo "Họ tên khách hàng: ".$_POST['fullname']."<br/>";
echo "Tên đăng nhập: ".$_POST['username']."<br/>";
echo "Mật khẩu: " .$_POST['passwords']."<br/>"; 
echo "Email đăng nhập: ".$_POST['email']."<br/>";
echo "Số điện thoại: ".$_POST['phone']."<br/>";
}
else {
echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="register.php";</script>';
}
}
}
?>

