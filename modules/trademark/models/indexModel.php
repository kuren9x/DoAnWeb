<?php


function get_list_trademark_product($id){
    $list_trademark_product=db_fetch_array("select * from tbl_product where id_trademark='$id'");
    return $list_trademark_product;
}
function get_trademark_id($id){
    $get_trademark_id=db_fetch_row("select * from tbl_trademark where id_trademark='$id'");
    return $get_trademark_id;
}

/////
function get_count_product_trademark($id){
    $count_product_trademark=db_num_rows("select * from tbl_product where id_trademark='$id'");
    return $count_product_trademark;
}