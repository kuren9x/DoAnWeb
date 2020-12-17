<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}
function orderAction()
{
    $username = $_SESSION['user_login'];
    $transaction = get_list_transaction($username);

    $data = array(
        'transaction' => $transaction
    );
    load_view("order", $data);
}
