<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
    load('helper', 'data');
}

//select
function indexAction()
{
    $username = $_SESSION['admin_login'];
    $info_admin = get_info_admin($username);
    $data = array(
        'info_admin' => $info_admin
    );
    load_view('index', $data);
}


function change_passAction()
{
    global $error, $success;
    $username = $_SESSION['admin_login'];
    $info_admin = get_info_admin($username);
    $password = $info_admin['password'];
    if (isset($_POST['btn_change_pass'])) {
        if (!empty($_POST['old_password'])) {
            if ($password == md5($_POST['old_password'])) {
               
            } else {
                $error['old_password'] = "Không trùng khớp, kiểm tra lại!!!";
            }
        } else {
            $error['old_password'] = "Không được để trống";
        }
        //new_password
        if (!empty($_POST['new_password'])) {
            if (!(strlen($_POST['new_password']) >= 6 && strlen($_POST['new_password']) <= 32)) {
                $error['new_password'] = "Ký tự phải từ 6 đến 32 ký tự";
            } else {
                if (is_password($_POST['new_password'])) {
                    $new_password = md5($_POST['new_password']);
                } else {
                    $error['new_password'] = "Không đúng định dạng, phải có ký tự viết hoa đầu tiên";
                }
            }
        } else {
            $error['new_password'] = "Không được để trống";
        }
        //re_password
        if (!empty($_POST['re_password'])) {
            if ($new_password == md5($_POST['re_password'])) {
                $re_password = md5($_POST['re_password']);
                // $error['re_password'] = "đúng định dạng yêu cầu";
            } else {
                $error['re_password'] = "Nhập lại mật khẩu không trùng khớp";
            }
        } else {
            $error['re_password'] = "Không được để trống";
        }
        if(empty($error)){
            $data=array(
                'password'=>$re_password,
            );
            update_pass($data,$username);
            $success['success']="Cập nhật mật khẩu thành công";
           
        }
    }
    load_view("change_pass",$success);
}
