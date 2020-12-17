<?php

function get_list_user($start, $num_user_page, $where = "")
{
    if (!empty($where)) {
        $where = "WHERE" . $where;
    }
    $result = db_fetch_array("SELECT * FROM tbl_user $where limit $start,$num_user_page");
    return $result;
    // require CONFIGPATH . DIRECTORY_SEPARATOR . 'user.php';
    // return $list_user;
}
function get_count_user($start, $num_user_page, $where = "")
{
    if (!empty($where)) {
        $where = "WHERE" . $where;
    }
    $result = db_num_rows("SELECT * FROM tbl_user $where limit $start,$num_user_page");
    return $result;
}
function get_count_all_users()
{
    $result = db_num_rows("SELECT * FROM tbl_user");
    return $result;
}
// function get_user_by_id($id)
// {
//     $item = db_fetch_row("SELECT * FROM tbl_user WHERE id_user = {$id}");
//     return $item;
// }
// function add_user($data)
// {
//     $insert_user = db_insert('tbl_user', $data);
//     return $insert_user;
// }
// function check_exits_user($username, $email)
// {
//     $check_exits_user = db_num_rows("select * from tbl_user where username='$username' or email='$email'");
//     if ($check_exits_user > 0) {
//         return true;
//     }
// }
// function update_user_id($data,$id){
//     $update_user_id=db_update('tbl_user',$data,"id_user='$id'");
//     return $update_user_id;
// }

// function delete_user_id($id){
//     $delete_user_id = db_delete('tbl_user',"id_user='$id'");
//     return $delete_user_id;
// }

