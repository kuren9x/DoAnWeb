<?php

function add_cat($data){
    $add_cat=db_insert('tbl_cat',$data);
    return $add_cat;
}
function check_exits_cat($name_cat){
    $check_exits_cat = db_num_rows("select * from tbl_cat where name_cat='$name_cat'");
    if ($check_exits_cat > 0) {
        return true;
    }
}

function get_list_cat(){
    $list_cat=db_fetch_array("select * from tbl_cat");
    return $list_cat;
}
function update_cat_id($data,$id){
    $update_cat_id=db_update('tbl_cat',$data,"id_cat='$id'");
    return $update_cat_id;
}
function delete_cat_id($id){
    $delete_cat_id=db_delete('tbl_cat',"id_cat='$id'");
    return $delete_cat_id;
}