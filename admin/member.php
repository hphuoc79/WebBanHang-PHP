<?php
include "header.php";
include "leftside.php";
// include "class/product_class.php";
include_once "../helper/format.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
include "class/admin_class.php";
// require_once(__ROOT__.'../admin/class/product_class.php');
?>
<?php
$us = new admin();
?>

        <div class="admin-content-right">
            <div class="table-content">
                <h1 style="color:#333">Tài khoản khách hàng:</h1>
                <br>
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <th>Họ tên khách hàng</th>
                        <th>Điện thoại</th>            
                        <th>Email</th>
                     
                    </tr>
                    <?php
                 $show_member = $us  -> show_member();
                 if($show_member){$i=0;while($result = $show_member->fetch_assoc()){$i++;
                ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $result['id']   ?></td>
                        <td> <?php echo $result['fullname']?></td>
                        <td> <?php echo $result['phone'] ?></td>
                        <td> <?php echo $result['email']  ?></td>    
                            
                    </tr>
                    <?php
                     }}
                  ?>
                </table>
               </div>        
        </div>
    </section>
    <section>
    </section>
    <script src="js/script.js"></script>
</body>
</html>  