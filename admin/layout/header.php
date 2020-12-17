<?php
$pages = get_module();
if (isset($_COOKIE['is_login'])) {
    $_SESSION['is_login'] = $_COOKIE['is_login'];
    $_SESSION['admin_login'] = $_COOKIE['admin_login'];
}
// echo $path;
if (!(is_login()) && $pages != 'login') {
    redirect_to('?mod=login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo base_url() ?>">
    <link rel="stylesheet" href="public/css/reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="public/css/style.css">
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/js.js"></script>
    <script src="public/js/ajax.js"></script>

    <title>Document</title>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <a href="<?php echo base_url("?mod=cart") ?>" class="logo">ADMIN</a>
            <?php
            // if ((is_login())) {
            ?>
            <div id="info_admin">
                <p> Xin chào:
                    <strong>
                        <?php
                        global $list_admin;
                        $list_admin = db_fetch_array("SELECT * FROM tbl_admin");
                        // echo user_login(); // lay gia tri username: vd abcxyz--> abcxyz
                        echo info_admin(admin_login(), 'fullname'); // se lay full name trong usernam cu list user
                        ?>
                    </strong>
                </p>
            </div>

            <?php
            // }
            ?>
            <ul id="dropdow_menu">
                <li><a href="<?php echo base_url("?mod=admin") ?>">Thông tin tài khoản</a></li>
                <li><a href="<?php echo base_url("?mod=login&action=logout") ?>" class="">Thoát</a></li>
            </ul>
        </div>