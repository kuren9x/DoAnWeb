<?php
function check_login($username, $password)
{
    global $list_user;
    foreach ($list_user as $user) {
        // if ($username == $user['username'] && md5($password) == $user['password'] && $user['is_active']=='1') {
        if ($username == $user['username'] && md5($password) == $user['password']) {

            return true;
        }
    }
}
function is_login()
{
    if (isset($_SESSION['is_login'])) {
        return true;
    }
}
function user_login()
{
    if (!empty($_SESSION['user_login'])) {
        return $_SESSION['user_login'];
    }
}

function info_user($username, $field)
// username la ten dang nhap ,field la key de lay trong list user
{
    global $list_user;
    if (isset($_SESSION['is_login'])) {
        foreach ($list_user as $user) {
            if ($username == $user['username']) {
                if (array_key_exists($field, $user)) {
                    return $user[$field];
                }
            }
        }
    }
}
