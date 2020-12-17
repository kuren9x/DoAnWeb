<?php
function is_username($username)
{
    $partten = "/^[A-Za-z0-9_ ]{6,32}$/";
    if (preg_match($partten, $username))
        // return false;
        return true;
}

function is_password($password)
{
    $partten = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
    if (preg_match($partten, $password))
        // return false;
        return true;
}

function is_gmail($email)
{
    $partten = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if (preg_match($partten, $email))
        // return false;
        return true;
}

function is_phone($phone)
{
    $partten = "/^(08|09|07|01[2|6|8|9])+([0-9]{8})$/";
    if (preg_match($partten, $phone))
        // return false;
        return true;
}

function form_error($label_field)
{
    global $error;
    if (!empty($error[$label_field])) {
        return $error[$label_field];
    }
}

function set_value($label_field_value)
{
    global $$label_field_value;
    if (!empty($$label_field_value)) {
        echo $$label_field_value;
    }
}

function selected_gender($name,$gender){
    if ((!empty($_POST[$name])) && ($_POST[$name] == $gender)) {
        echo "selected='selected'";
    }
}