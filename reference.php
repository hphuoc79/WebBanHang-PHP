<?php
include "header.php";
?>

<style>

.reference {
  padding: 80px 0;
}

.reference-content {
  padding: 0 0;
}

.reference-content h1{
    font-size: 30px;
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
    text-align: center;
    justify-content: center;
    color: blue;
    margin-bottom: 35px;
}

.container-item {
    margin-left: 30px;
    margin-bottom: 20px;
}

.container-item img{
    width: 350px;
    height: 300px;
}

.container-item a>h3 {
    margin-top: 15px;
}

.container-item p{
    margin: 7px 7px;

}

.container-item a{
    text-align: center;
    color: #66CCFF;
}

.row{
    display: flex;
    flex-wrap: wrap;
}

.content-1{
    width: 350px;
    height: 100px;
}

.content-1 p{
    font-size: 13px;
}

</style>

<section class="reference">
    <div class="reference-content">
        <h1>Bảng Tham Khao Size Các Sản Phẩm</h1>
        <div class="container row">
            <div class="container-item">
                <img src="image/Size/aothun.png">
                <a href="#"><h3>Tham Khảo Size Áo Thun</h3></a>
                <div class="content-1">
                <p>Khi bạn có nhu cầu mua một chiếc áo thun, việc chọn 
                size sẽ là điều cuối cùng quyết định xem có nên mua
                chiếc áo đó hay không. Tuy nhiên, tuỳ loại...</p>
                </div>
            </div>
            
            <div class="container-item">
                <img src="image/Size/quan.png">
                <a href="#"><h3>Tham Khảo Size Quần</h3></a>
                <div class="content-1">
                <p>Thị trường quần áo thời trang ngày càng phát triển nhanh chóng, kém theo đó là có rất nhiều loại quần áo có size số khác nhau để khác hàng chọn lựa như: Quần tây, quần jean, quần short đi biển, quần lót...</p>
                </div>
            </div>
            
            <div class="container-item">
                <img src="image/Size/giaynam.png">
                <a href="#"><h3>Tham Khảo Size Giày Nam</h3></a>
                <div class="content-1">
                <p>Bảng size giày là bảng thông số đo chiều dài và chiều rộng chân cho nam nữ để chọn loại giày phù hợp cho từng người. Một bảng size giày chuẩn sẽ tạo điều kiện cho mọi người có được đôi giày yêu thích và thoải mái khi mang. Sau đây...</p>
                </div>
            </div>

            <div class="container-item">
                <img src="image/Size/giaynu.png">
                <a href="#"><h3>Tham Khảo Size Giày Nữ</h3></a>
                <div class="content-1">
                <p>Bảng size giày là bảng thông số đo chiều dài và chiều rộng chân cho nam nữ để chọn loại giày phù hợp cho từng người. Một bảng size giày chuẩn sẽ tạo điều kiện cho mọi người có được đôi giày yêu thích và thoải mái khi mang. Sau đây...</p>
                </div>
            </div>

            <div class="container-item">
                <img src="image/Size/hoodie.jpg">
                <a href="#"><h3>Tham Khảo Size Hoodie</h3></a>
                <div class="content-1">
                <p>Hoodie không còn xa lạ với nhiều người, cho dù đây là ngôn ngữ tiếng Anh về thời trang, tại Việt Nam, ngoài tên gọi là hoodie, mọi người còn gọi kiểu áo này bằng các tên gọi khác như áo mũ, hay áo có mũ,… </p>
                </div>
            </div>

            <div class="container-item">
                <img src="image/Size/vay.jpg">
                <a href="#"><h3>Tham Khảo Size Váy</h3></a>
                <div class="content-1">
                <p>Rất nhiều chị em hiện nay mắc sai lầm khi lựa chọn size váy khiến dìm vóc dáng bản thân. Vì thế, việc nắm bắt cách chọn size váy chuẩn, phù hợp chiều cao, cân nặng, số đo 3 vòng rất cần thiết và quan trọng. Cùng...</p>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
include "footer.php"
?>