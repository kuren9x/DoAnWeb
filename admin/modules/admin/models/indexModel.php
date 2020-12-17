<?php

function get_info_admin($username){
    $result=db_fetch_row("select * from tbl_admin where username='$username'");
    return $result;
}
function update_pass($data,$username){
    $result=db_update('tbl_admin',$data,"username='$username'");
return $result;
}