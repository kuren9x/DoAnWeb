<?php

function get_list_user()
{
    $result = db_fetch_array("SELECT * FROM tbl_user");
    return $result;
    // require CONFIGPATH . DIRECTORY_SEPARATOR . 'user.php';
    // return $list_user;
}
function add_user($data)
{
    $insert_user = db_insert('tbl_user', $data);
    return $insert_user;
}
function check_exits_user($username, $email)
{
    $check_exits_user = db_num_rows("select * from tbl_user where username='$username' or email='$email'");
    if ($check_exits_user > 0) {
        return true;
    }
}

//active 
function active_user($active_token)
{
    $active_user = db_update('tbl_user', array('is_active' => 1), "active_token='$active_token'");
    return $active_user;
}

function check_active_user($active_token)
{
    $check_token = db_num_rows("select * from tbl_user where active_token = '$active_token'and is_active = '0'");
    if ($check_token > 0) {
        return true;
    }
}

function check_active_token($active_token)
{
    $check_exits_token = db_num_rows("select * from tbl_user where active_token='$active_token'");
    if ($check_exits_token > 0) {
        return true;
    }
}
// forgot_password
function check_mail($email)
{
    $check_mail = db_num_rows("select * from tbl_user where email='$email'");
    if ($check_mail > 0) {
        return true;
    }
}
function update_reset_pass_token($data, $email)
{
    $update_reset_pass_token = db_update('tbl_user', $data, "email='$email'");
    return $update_reset_pass_token;
}
function check_pass_token($reset_pass_token)
{
    $check_pass_token = db_num_rows("select * from tbl_user where reset_pass_token='$reset_pass_token'");
    if ($check_pass_token > 0) {
        return true;
    }
}

function update_password($data, $reset_pass_token)
{
    $update_password = db_update('tbl_user', $data, "reset_pass_token='$reset_pass_token'");
    return $update_password;
}
