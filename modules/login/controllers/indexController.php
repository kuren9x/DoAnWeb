<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
    // load('lib', 'email');
}

function loginAction()
{
    global $list_user, $username, $password, $error;
    $list_user = get_list_user();
    if (isset($_POST['btn_login'])) {
        $error = array();
        if (!empty($_POST['username'])) {
            $username = $_POST['username'];
        } else {
            $error['username'] = "Không được để trống";
        }

        if (!empty($_POST['password'])) {
            $password = $_POST['password'];
        } else {
            $error['password'] = "Không được để trống";
        }
        if (empty($error)) {
            if (check_login($username, $password)) {
                //session
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;
                redirect_to('?mod=home&controller=index');
            } else {
                $error['account'] = "Tài khoản hoặc mật khẩu không đúng";
            }
        }
    }
    load_view('login');
}

function logoutAction()
{
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    redirect_to(base_url('?mod=home'));
}

function regAction()
{
    global $error, $username, $fullname, $password, $email, $success;
    // global $$label_field_value;
    if (isset($_POST['btn_register'])) {
        $error = array();
        $success = array();
        //fullname
        if (!empty($_POST['fullname'])) {
            if (!(strlen($_POST['fullname']) >= 6 && strlen($_POST['fullname']) <= 32)) {
                $error['fullname'] = "Ký tự phải từ 6 đến 32 ký tự";
            } else {
                $fullname = $_POST['fullname'];
            }
        } else {
            $error['fullname'] = "Không được để trống";
        }

        //username
        if (!empty($_POST['username'])) {
            if (!(strlen($_POST['username']) >= 6 && strlen($_POST['username']) <= 32)) {
                $error['username'] = "Ký tự phải từ 6 đến 32 ký tự";
            } else {
                if (is_username($_POST['username'])) {
                    $username = $_POST['username'];
                }
            }
        } else {
            $error['username'] = "Không được để trống";
        }

        //password
        if (!empty($_POST['password'])) {
            if (!(strlen($_POST['password']) >= 6 && strlen($_POST['password']) <= 32)) {
                $error['password'] = "Ký tự phải từ 6 đến 32 ký tự";
            } else {
                if (is_password($_POST['password'])) {
                    $password = md5($_POST['password']);
                } else {
                    $error['password'] = "Ký tự phải có chữ cái hoa đầu tiên";
                }
            }
        } else {
            $error['password'] = "Không được để trống";
        }

        //mail
        if (!empty($_POST['email'])) {
            if (!(strlen($_POST['email']) >= 6 && strlen($_POST['email']) <= 32)) {
                $error['email'] = "Ký tự phải từ 6 đến 32 ký tự";
            } else {
                if (is_gmail($_POST['email'])) {
                    $email = $_POST['email'];
                }
            }
        } else {
            $error['email'] = "Không được để trống";
        }

        // kết luận
        if (empty($error)) {
            // ktra username và email có tồn tại trên hệ thống chưa 
            if (check_exits_user($username, $email)) {
                $error['account'] = "usename hoặc email đã tồn tại trên hệ thống";
            } else {
                // $active_token = md5($username . time());
                $data = array(
                    'username' => $username,
                    'fullname' => $fullname,
                    'password' => $password,
                    'email' => $email,
                );
                add_user($data);
                $success['success'] = "Đăng ký thành công, vui lòng đăng nhập";
            }
        }
        // show_array($_POST);
    }
    load_view('reg', $success);
}

