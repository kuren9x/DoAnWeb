<?php
function get_search($search){
    $result=db_fetch_array("select * from tbl_product where name_product like '%$search%'");
    return $result;
}
