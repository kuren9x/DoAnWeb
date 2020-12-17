<?php
get_header();
?>

<!------------------------------------------------------------------------------------->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        </div>
        <img src="public/Img/breadcrumb_bg.webp" class="d-block w-100" height="170px">
    </div>
    <!----------------------------->
    <div class="container">
        <div class="col-12 mt-2" style="background-color: #F0F0F0">
            <legend class="font-weight-bold" style="text-align: center;"> Đăng nhập thông tin</legend>
            <form method="POST" class="needs-validation" action="">

                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Nhập tài khoản" name="username">
                    <div class="text-danger font-italic ml-3 mt-3">
                        <?php echo form_error('username') ?>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" placeholder="Nhập mật khẩu" name="password">
                    <div class="text-danger font-italic ml-3 mt-3">
                        <?php echo form_error('password') ?>
                    </div>
                </div>

                <div class="form-group">
                    <input class="form-control btn btn-info" type="submit" value="Đăng nhập" name="btn_login">
                    <div class="text-danger font-italic ml-3 mt-3">
                        <?php echo form_error('account') ?>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <?php
    // get_footer()
    ?>