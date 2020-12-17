<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo base_url(); ?>">
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/login.css">
    <title>Document</title>
</head>

<body>
    <div id="wp_login">
        <h1>Đăng nhập</h1>
        <form action="" id="form_login" method="POST">
            <input type="text" name="username" id="username" placeholder="nhập username" value="<?php echo set_value('username') ?>">
            <p class="error"><?php echo form_error('username') ?></p>
            <input type="password" name="password" id="password" placeholder="nhập password" value="">
            <p class="error"><?php echo form_error('password') ?></p>
            <div class="remember_me">
                <label for="remember_me" class="remember_me">Ghi nhớ đăng nhập</label>
                <input type="checkbox" name="remember_me" id="remember_me" >
            </div>
            <input type="submit" value="danh nhap" name="btn_login" id="btn_login">
        </form>
        <p class="error"><?php echo form_error('account') ?></p>
    </div>
</body>

</html>