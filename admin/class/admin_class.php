<?php
require_once(__ROOT__.'/admin/lib/database.php');
require_once(__ROOT__.'/admin/lib/session.php');
?>

<?php
class admin
{

   private $db;

public function __construct()
   {
       $this ->db = new Database();
    
   }

public function check_admin($adminname,$adminpassword){
    $query = "SELECT * FROM tbl_admin  WHERE admin_name = '$adminname' AND admin_password = '$adminpassword' LIMIT 1 ";
    $result = $this -> db ->select($query);
    if($result!=false) {
        $value = $result ->fetch_assoc();
        Session::set('user_login',true);
        Session::set('admin_name',$value['admin_name']);
        Session::set('admin_id',$value['admin_id']);
        // echo Session::get('admin_name');
        header('Location:index.php');
    }
    else {
        $alert = "Tên đăng nhập hoặc mật khẩu không đúng";
        return $alert;
    }
    // return $result;
}

public function show_member(){
    $query = "SELECT * FROM member ORDER BY id DESC";
    $result = $this -> db ->select($query);
    return $result;
}

       
   }


?>