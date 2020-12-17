<?php

function add_trademark($data)
{
    $add_trademark = db_insert('tbl_trademark', $data);
    return $add_trademark;
}
function check_exits_trademark($name_trademark, $id_cat)
{
    $check_exits_trademark = db_num_rows("select * from tbl_trademark where name_trademark='$name_trademark' and id_cat='$id_cat'");
    if ($check_exits_trademark > 0) {
        return true;
    }
}

function get_list_cat()
{
    $list_cat = db_fetch_array("select * from tbl_cat");
    return $list_cat;
}
function get_list_trademark()
{
    $list_trademark = db_fetch_array("select * from tbl_cat,tbl_trademark where tbl_cat.id_cat = tbl_trademark.id_cat");
    return $list_trademark;
}
function update_trademark_id($data, $id)
{
    $update_trademark_id = db_update('tbl_trademark', $data, "id_trademark='$id'");
    return $update_trademark_id;
}
function delete_trademark_id($id)
{
    $delete_trademark_id = db_delete('tbl_trademark', "id_trademark='$id'");
    return $delete_trademark_id;
}
