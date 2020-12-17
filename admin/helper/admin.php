<?php
function check_login($username, $password)
{
    global $list_admin;
    foreach ($list_admin as $admin) {
        if ($username == $admin['username'] && md5($password) == $admin['password']) {
            return true;
        }
    }
}
function is_login()
{
    if (isset($_SESSION['is_login_admin'])) {
        return true;
    }
}
function admin_login()
{
    if (!empty($_SESSION['admin_login'])) {
        return $_SESSION['admin_login'];
    }
}

function info_admin($username, $field)
// username la ten dang nhap ,field la key de lay trong list user
{
    global $list_admin;
    if (isset($_SESSION['is_login_admin'])) {
        foreach ($list_admin as $admin) {
            if ($username == $admin['username']) {
                if (array_key_exists($field, $admin)) {
                    return $admin[$field];
                }
            }
        }
    }
}

