<?php

$list_cat = db_fetch_array("select * from tbl_cat order by id_cat ASC ");
$list_trademark = db_fetch_array("select * from tbl_trademark order by id_trademark ASC");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NhanEwShop</title>
    <base href="<?php echo base_url() ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="public/js/js.js"></script>
    <script src="public/js/ajax.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background: #000;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://theme.hstatic.net/1000333077/1000434853/14/logo.png?v=139">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="nav navbar-nav navbar-right ">
                    <li class="nav-item active">
                        <a class="nav-link text-white " style="margin-left: 300px;" href="#">TRANG CHỦ</a>
                    </li>
                    <li class="nav-item dropdown text-white">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" data-toggle="dropdown">
                            BỘ SƯU TẬP
                        </a>
                        <div class="dropdown-menu">
                            <?php
                            if (!empty($list_cat)) {
                                foreach ($list_cat as &$cat) {
                                    $cat['url'] = "?mod=cat&action=show_cat&id={$cat['id_cat']}";
                            ?>
                                    <a class="dropdown-item" href="<?php echo base_url($cat['url']) ?>"><?php echo $cat['name_cat'] ?></a>

                            <?php }
                            } ?>

                        </div>
                    </li>
                    <li class="nav-item dropdown text-white">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" data-toggle="dropdown">
                            THƯƠNG HIỆU
                        </a>
                        <div class="dropdown-menu">
                            <?php
                            if (!empty($list_trademark)) {
                                foreach ($list_trademark as &$trademark) {
                                    $trademark['url'] = "?mod=trademark&action=show_trademark&id={$trademark['id_trademark']}";
                            ?>
                                    <a class="dropdown-item" href="<?php echo base_url($trademark['url']) ?>"><?php echo $trademark['name_trademark'] ?></a>
                            <?php
                                }
                            }
                            ?>

                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-white" href="<?php echo base_url("?mod=cart&action=show_cart") ?>">GIỎ HÀNG</a>
                    </li>
                    <?php
                    if ((is_login())) {
                        global $list_user;
                        $list_user = db_fetch_array("select * from tbl_user");
                    ?>
                        <li class="nav-item dropdown text-white">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" data-toggle="dropdown">
                                <?php echo info_user(user_login(), 'fullname') ?>
                            </a>
                            <div class="dropdown-menu">
                                <a href="<?php echo base_url("?mod=user&action=order") ?>" class="dropdown-item">Đơn hàng</a>
                            </div>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo base_url('?mod=login&action=logout') ?>">ĐĂNG XUẤT</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo base_url('?mod=login&action=login') ?>">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo base_url('?mod=login&action=reg') ?>">Đăng ký</a>
                        </li>
                    <?php
                    }
                    ?>
                    </form>
                    
                </ul>
            </div>
        </div>
    </nav>
</body>