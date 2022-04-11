<?php
 define('__ROOT__', dirname(dirname(__FILE__))); 
 require_once(__ROOT__.'/admin/lib/database.php');
 require_once(__ROOT__.'/admin/lib/session.php');
 require_once(__ROOT__.'/admin/helper/format.php');
?>

<?php
 class index
 {

    private $db;
    private $fm;

    public function __construct()
    {
        $this ->db = new Database();
        $this ->fm = new Format();
    }

    public function check_user($username,$passwords){
        $query = "SELECT * FROM member  WHERE username = '$username' AND passwords = '$passwords' LIMIT 1 ";
        $result = $this -> db ->select($query);
        if($result!=false) {
            $value = $result ->fetch_assoc();
            // Session::set('user_login',true);
            Session::set('username',$value['username']);
            Session::set('phone',$value['phone']);
            Session::set('id',$value['id']);
            // echo Session::get('admin_name');
            header('Location:index.php');
        }
        else {
            $alert = "Tên đăng nhập hoặc mật khẩu không đúng";
            return $alert;
        }}

    
    public function get_anh($sanpham_id) {
        $query = "SELECT * FROM tbl_sanpham_anh WHERE sanpham_id = '$sanpham_id' ORDER BY sanpham_anh_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function get_size($sanpham_id) {
        $query = "SELECT * FROM tbl_sanpham_size WHERE sanpham_id = '$sanpham_id' ORDER BY sanpham_size_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function get_loaisanpham($loaisanpham_id){
        $query = "SELECT tbl_sanpham.*, tbl_danhmuc.danhmuc_ten,tbl_loaisanpham.loaisanpham_ten
        FROM tbl_sanpham INNER JOIN tbl_danhmuc ON tbl_sanpham.danhmuc_id = tbl_danhmuc.danhmuc_id
        INNER JOIN tbl_loaisanpham ON tbl_sanpham.loaisanpham_id = tbl_loaisanpham.loaisanpham_id
        WHERE tbl_sanpham.loaisanpham_id = '$loaisanpham_id'
        ORDER BY tbl_sanpham.sanpham_id DESC  ";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function get_loaisanphamA($loaisanpham_id){
        $query = "SELECT tbl_sanpham.*, tbl_danhmuc.danhmuc_ten,tbl_loaisanpham.loaisanpham_ten
        FROM tbl_sanpham INNER JOIN tbl_danhmuc ON tbl_sanpham.danhmuc_id = tbl_danhmuc.danhmuc_id
        INNER JOIN tbl_loaisanpham ON tbl_sanpham.loaisanpham_id = tbl_loaisanpham.loaisanpham_id
        WHERE tbl_sanpham.loaisanpham_id = '$loaisanpham_id'
        ORDER BY tbl_sanpham.sanpham_id DESC  ";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function get_sanphamlienquan( $loaisanpham_id,$sanpham_id){
        $query = "SELECT tbl_sanpham.*, tbl_danhmuc.danhmuc_ten,tbl_loaisanpham.loaisanpham_ten
        FROM tbl_sanpham INNER JOIN tbl_danhmuc ON tbl_sanpham.danhmuc_id = tbl_danhmuc.danhmuc_id
        INNER JOIN tbl_loaisanpham ON tbl_sanpham.loaisanpham_id = tbl_loaisanpham.loaisanpham_id
        WHERE tbl_sanpham.loaisanpham_id = '$loaisanpham_id' && tbl_sanpham.sanpham_id != '$sanpham_id'
        ORDER BY tbl_sanpham.sanpham_id DESC LIMIT 0,5  ";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function get_sanpham($sanpham_id) {
        $query = "SELECT tbl_sanpham.*, tbl_danhmuc.danhmuc_ten,tbl_loaisanpham.loaisanpham_ten,tbl_color.color_ten,tbl_color.color_anh
        FROM tbl_sanpham INNER JOIN tbl_danhmuc ON tbl_sanpham.danhmuc_id = tbl_danhmuc.danhmuc_id
        INNER JOIN tbl_loaisanpham ON tbl_sanpham.loaisanpham_id = tbl_loaisanpham.loaisanpham_id
        INNER JOIN tbl_color ON tbl_sanpham.color_id = tbl_color.color_id
        WHERE tbl_sanpham.sanpham_id = '$sanpham_id'
        ORDER BY tbl_sanpham.sanpham_id DESC  ";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_danhmuc_indexG($danhmuc_id){
        // $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC";
        $query = "SELECT * FROM tbl_danhmuc WHERE danhmuc_id = '$danhmuc_id' ORDER BY danhmuc_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_product_indexD($danhmuc_id,$baiviet_id){
        // $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC";
        $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.danhmuc_id = tbl_danhmuc.danhmuc_id 
        WHERE tbl_baiviet.danhmuc_id = '$danhmuc_id' && baiviet_id != '$baiviet_id'  
        ORDER BY tbl_baiviet.baiviet_id DESC LIMIT 0,10";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_product(){
        // $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC";
        $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
        FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.baiviet_danhmuc = tbl_danhmuc.danhmuc_id
        ORDER BY tbl_danhmuc.danhmuc_id DESC  ";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_danhmuc(){
        $query = "SELECT * FROM tbl_danhmuc ORDER BY danhmuc_id";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_loaisanpham($danhmuc_id) {
        $query = "SELECT * FROM tbl_loaisanpham  WHERE danhmuc_id = '$danhmuc_id' ORDER BY loaisanpham_id";
        $result = $this -> db ->select($query);
        return $result;
    }

    public function get_product($product_id){
        $query = "SELECT * FROM tbl_baiviet WHERE baiviet_id = '$product_id'";
        $result = $this -> db ->select($query);
        return $result;
    }

    
        

    public function makeUrl($string){
        $string = trim($string);
        $string = str_replace(' ','-',$string);
        $string = strtolower($string);
        $string = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $string);
        $string = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $string);
        $string = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $string);
        $string = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $string);
        $string = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $string);
        $string = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $string);
        $string = preg_replace("/(đ)/", "d", $string);
        $string = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $string);
        $string = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $string);
        $string = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $string);
        $string = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $string);
        $string = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $string);
        $string = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $string);
        $string = preg_replace("/(Đ)/", "D", $string);
        return $string;
    }


   public function getCurURL()
{
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
        $pageURL = "https://";
    } else {
      $pageURL = 'http://';
    }
    if (isset($_SERVER["SERVER_PORT"]) && $_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}
    public function insert_cart($sanpham_anh,$session_idA,$sanpham_id,$sanpham_tieude,$sanpham_gia,$color_anh,$quantitys,$sanpham_size)
    {
        $query = "INSERT INTO tbl_cart (sanpham_anh,session_idA,sanpham_id,sanpham_tieude,sanpham_gia,color_anh,quantitys,sanpham_size) VALUES 
        ('$sanpham_anh','$session_idA','$sanpham_id','$sanpham_tieude','$sanpham_gia','$color_anh','$quantitys','$sanpham_size')";
        $result = $this ->db ->insert($query);
        return $result;     
    }

    public function show_cart($session_id){
        $query = "SELECT * FROM tbl_cart WHERE session_idA = '$session_id' ORDER BY cart_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_cartF($session_id){
        $query = "SELECT * FROM tbl_cart WHERE session_idA = '$session_id' ORDER BY cart_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_cartB($session_id){
        $query = "SELECT * FROM tbl_cart WHERE session_idA = '$session_id' ORDER BY cart_id DESC";
        $result = $this -> db ->selectdc($query);
        return $result;
    }
    public function show_cartC($session_id){
        $query = "SELECT * FROM tbl_order WHERE session_idA = '$session_id' ORDER BY order_id DESC LIMIT 1";
        $result = $this -> db ->selectdc($query);
        return $result;
    }
    public function delete_cart($cart_id){
        $query = "DELETE  FROM tbl_cart WHERE cart_id = '$cart_id'";
        $result = $this -> db ->delete($query);
        if($result){  
            $query = "SELECT * FROM tbl_cart ORDER BY cart_id";
            $resultA = $this -> db ->select($query);
            if($resultA==null){
                Session::set('SL',null);
            }

        }
        return $result;
}
    public function show_diachi(){
        $query = "SELECT DISTINCT tinh_tp,ma_tinh FROM tbl_diachi ORDER BY ma_tinh";
        $result = $this -> db ->selectdc($query);
        return $result;
    }
    public function show_diachi_qh($tinh){
        $query = "SELECT DISTINCT tinh_tp,ma_tinh,quan_huyen,ma_qh FROM tbl_diachi WHERE ma_tinh = '$tinh' ORDER BY ma_qh";
        $result = $this -> db ->selectdc($query);
        return $result;
    }
    public function show_diachi_px($quan_huyen_id){
        $query = "SELECT DISTINCT tinh_tp,ma_tinh,quan_huyen,ma_qh,phuong_xa,ma_px FROM tbl_diachi WHERE ma_qh = '$quan_huyen_id' ORDER BY ma_px";
        $result = $this -> db ->selectdc($query);
        return $result;
    }
    public function insert_order($session_idA,$loaikhach,$customer_name,$customer_phone,
    $customer_tinh,$customer_huyen,$customer_xa,$customer_diachi) {
        $query = "SELECT * FROM tbl_order WHERE session_idA = '$session_idA' ORDER BY order_id DESC";
        $result = $this -> db ->select($query);
        if($result==null) {
            $query = "INSERT INTO tbl_order (session_idA,loaikhach,customer_name,customer_phone,customer_tinh,customer_huyen,customer_xa,customer_diachi) VALUES 
            ('$session_idA','$loaikhach','$customer_name','$customer_phone','$customer_tinh','$customer_huyen','$customer_xa','$customer_diachi')";
            $result = $this ->db ->insert($query);
            header('Location:payment.php');
        }
        else {
            header('Location:payment.php');
        }
       
        return $result;    
    }
    public function insert_payment($session_idA,$deliver_method,$method_payment,$today) {
        $query = "SELECT * FROM tbl_payment WHERE session_idA = '$session_idA' ORDER BY payment_id DESC";
        $result = $this -> db ->select($query);
        if($result==null) {
            $query = "SELECT * FROM tbl_cart WHERE session_idA = '$session_idA' ORDER BY cart_id DESC";
            $resultA = $this -> db ->select($query);
            if($resultA){while($resultB=$resultA->fetch_assoc()){
            $cart_id = $resultB['cart_id'];
            $sanpham_anh = $resultB['sanpham_anh'];
            $sanpham_id = $resultB['sanpham_id'];
            $sanpham_tieude = $resultB['sanpham_tieude'];
            $sanpham_gia = $resultB['sanpham_gia'];
            $color_anh = $resultB['color_anh'];
            $quantitys = $resultB['quantitys'];
            $sanpham_size = $resultB['sanpham_size'];
            $query = "INSERT INTO tbl_carta (sanpham_anh,session_idA,sanpham_id,sanpham_tieude,sanpham_gia,color_anh,quantitys,sanpham_size) VALUES 
             ('$sanpham_anh','$session_idA','$sanpham_id','$sanpham_tieude','$sanpham_gia','$color_anh','$quantitys','$sanpham_size')";
             $resultC= $this ->db ->insert($query);
             if($resultC){
                $query = "DELETE  FROM tbl_cart WHERE cart_id = '$cart_id'";
                $resultD = $this -> db ->delete($query);
                Session::set('SL',null);
            //    return $resultB;  
             }
            

             }} 
       
            $query = "INSERT INTO tbl_payment (session_idA,giaohang,thanhtoan,order_date) VALUES 
            ('$session_idA','$deliver_method','$method_payment','$today')";
            $result = $this ->db ->insert($query);
            header('Location:success.php');
            return $result;  
            }

        else {
            $query = "SELECT * FROM tbl_cart WHERE session_idA = '$session_idA' ORDER BY cart_id DESC";
            $resultA = $this -> db ->select($query);
            if($resultA){while($resultB=$resultA->fetch_assoc()){
            $cart_id = $resultB['cart_id'];
            $sanpham_anh = $resultB['sanpham_anh'];
            $sanpham_id = $resultB['sanpham_id'];
            $sanpham_tieude = $resultB['sanpham_tieude'];
            $sanpham_gia = $resultB['sanpham_gia'];
            $color_anh = $resultB['color_anh'];
            $quantitys = $resultB['quantitys'];
            $sanpham_size = $resultB['sanpham_size'];
            $query = "INSERT INTO tbl_carta (sanpham_anh,session_idA,sanpham_id,sanpham_tieude,sanpham_gia,color_anh,quantitys,sanpham_size) VALUES 
             ('$sanpham_anh','$session_idA','$sanpham_id','$sanpham_tieude','$sanpham_gia','$color_anh','$quantitys','$sanpham_size')";
             $resultC= $this ->db ->insert($query);
             if($resultC){
                $query = "DELETE  FROM tbl_cart WHERE cart_id = '$cart_id'";
                $resultD = $this -> db ->delete($query);
                Session::set('SL',null);
            //    return $resultB;  
             }
            

             }} 
            header('Location:success.php');
        }
       

        
    }
    public function show_carta($session_id){
        $query = "SELECT * FROM tbl_carta WHERE session_idA = '$session_id' ORDER BY carta_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_order($session_id) {
        $query = "SELECT tbl_order.*, tbl_diachi.*
        FROM tbl_order INNER JOIN tbl_diachi ON tbl_order.customer_xa = tbl_diachi.ma_px
        WHERE tbl_order.session_idA = '$session_id'
        ORDER BY tbl_order.order_id DESC LIMIT 1  ";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_payment($session_id) {
        $query = "SELECT * FROM tbl_payment WHERE session_idA = '$session_id' ORDER BY payment_id DESC LIMIT 1";
        $result = $this -> db ->select($query);
        return $result;
    }

    

}

 
?>