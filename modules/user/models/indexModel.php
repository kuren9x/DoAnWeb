<?php
function get_list_transaction($username){
    $result=db_fetch_array("select * from tbl_transaction where username='$username'");
    return $result;
}
function get_list_order($transaction_code){
    $result=db_fetch_array("select * from tbl_order where transaction_code='$transaction_code' ");
    return $result;
}
