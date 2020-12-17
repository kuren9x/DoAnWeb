<?php

function get_list_transaction()
{
    $list_transaction = db_fetch_array("select * from tbl_transaction ");
    return $list_transaction;
}
function get_list_transaction_code($transaction_code = "")
{
    $list_transaction = db_fetch_row("select * from tbl_transaction where transaction_code='$transaction_code'");
    return $list_transaction;
}

function get_list_order($transaction_code)
{
    $list_order = db_fetch_array("select * from tbl_order where transaction_code='$transaction_code'");
    return $list_order;
}
function updadte_status_transaction($dadta, $transaction_code)
{
    $updadte_status_transaction = db_update('tbl_transaction', $dadta, "transaction_code='$transaction_code'");
    return $updadte_status_transaction;
}
function delete_transaction_id($id)
{
    $delete_transaction_id = db_delete('tbl_transaction', "id_order='$id'");
    return $delete_transaction_id;
}
