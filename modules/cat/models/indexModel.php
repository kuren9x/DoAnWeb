<?php


function get_list_cat_product($id){
    $list_cat_product=db_fetch_array("select * from tbl_product where id_cat='$id'");
    return $list_cat_product;
}
function get_cat_id($id){
    $get_cat_id=db_fetch_row("select * from tbl_cat where id_cat='$id'");
    return $get_cat_id;
}

//soluong
function get_count_product_cat($id){
    $count_product_cat=db_num_rows("select * from tbl_product where id_cat='$id'");
    return $count_product_cat;
}