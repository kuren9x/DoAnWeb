<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
    load('helper', 'data');
}

function indexAction()
{
    global $list_admin, $username, $password, $error;
    $list_admin = get_list_admin();
    if (isset($_POST['btn_login'])) {
        $error = array();
        if (!empty($_POST['username'])) {
            $username = $_POST['username'];
        } else {
            $error['username'] = "ko dc de trong username";
        }

        if (!empty($_POST['password'])) {
            $password =  $_POST['password'];
        } else {
            $error['password'] = "ko dc de trong password";
        }
        if (empty($error)) {
            if (check_login($username, $password)) {
                // cookie
                if (isset($_POST['remember_me'])) {
                    setcookie('is_login_admin', true, time() + 3600);
                    setcookie('admin_login', $username, time() + 3600);
                }
                //session
                $_SESSION['is_login_admin'] = true;
                $_SESSION['admin_login'] = $username;
                redirect_to(base_url('?mod=cart&controller=index'));
            } else {
                $error['account'] = "Tài khoản bạn không tồn tại trên hệ thống";
            }
        }
    }
    load_view('index');
}

function logoutAction()
{
    load_view('logout');
}
