<?php
get_header()
?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        </div>
        <img src="public/Img/breadcrumb_bg.webp" class="d-block w-100" height="170px">
    </div>
    <!----------------------------->
    <div class="container">
        <div class="col-12 mt-2" style="background-color: #F0F0F0">
            <legend class="font-weight-bold" style="text-align: center;">Đăng kí thông tin thành viên</legend>
            <form method="POST" class="needs-validation" novalidate="" action="">
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Nhập họ và tên" name="fullname" required="">
                    <div class="text-danger font-italic ml-3 mt-3">
                        <?php echo form_error('fullname') ?>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Nhập tài khoản" name="username" required="">
                    <div class="text-danger font-italic ml-3 mt-3">
                        <?php echo form_error('username') ?>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" placeholder="Nhập mật khẩu" name="password" required="">
                    <div class="text-danger font-italic ml-3 mt-3">
                        <?php echo form_error('password') ?>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" placeholder="Nhập email" name="email" required="">
                    <div class="text-danger font-italic ml-3 mt-3">
                        <?php echo form_error('email') ?>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control btn btn-info" type="submit" value="Đăng kí" name="btn_register">
                    <div class="text-danger font-italic ml-3 mt-3">
                        <?php echo form_error('account') ?>
                    </div>
                </div>
            </form>
            <?php if (!empty($success)) {
            ?>
                <p><?php echo $success ?><span><a href="<?php echo base_url("?mod=login&action=login") ?>"> tại đây</a></span></p>

            <?php } ?>

        </div>
    </div>

    <?php
    get_footer()
    ?>