<?php

function add_product($data)
{
    $add_product = db_insert('tbl_product', $data);
    return $add_product;
}
// function check_exits_trademark($name_trademark, $id_cat)
// {
//     $check_exits_trademark = db_num_rows("select * from tbl_trademark where name_trademark='$name_trademark' and id_cat='$id_cat'");
//     if ($check_exits_trademark > 0) {
//         return true;
//     }
// }
function get_list_product()
{
    $list_product = db_fetch_array("select * from tbl_cat,tbl_trademark,tbl_product where tbl_product.id_trademark = tbl_trademark.id_trademark and tbl_product.id_cat=tbl_cat.id_cat order by tbl_product.id_product ASC");
    return $list_product;
}
function get_list_cat()
{
    $list_cat = db_fetch_array("select * from tbl_cat");
    return $list_cat;
}
function get_list_trademark()
{
    $list_trademark = db_fetch_array("select * from tbl_trademark");
    return $list_trademark;
}
function update_product_id($data, $id)
{
    $update_product_id = db_update('tbl_product', $data, "id_product='$id'");
    return $update_product_id;
}
function delete_product_id($id)
{
    $delete_product_id = db_delete('tbl_product', "id_product='$id'");
    return $delete_product_id;
}
