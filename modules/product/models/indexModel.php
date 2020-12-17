<?php


function get_detail_product($id){
    $detail_product=db_fetch_row("select * from tbl_product where id_product='$id'");
    return $detail_product;
}