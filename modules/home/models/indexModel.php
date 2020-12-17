<?php

function get_list_product($star, $num_product_page)
{
    $list_product = db_fetch_array("select * from tbl_product limit {$star},{$num_product_page} ");
    return $list_product;
}

function count_all_product()
{
    $count_all_product = db_num_rows("select * from tbl_product");
    return $count_all_product;
}
