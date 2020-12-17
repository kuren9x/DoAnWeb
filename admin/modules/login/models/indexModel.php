<?php

function get_list_admin()
{
    $result = db_fetch_array("SELECT * FROM tbl_admin");
    return $result;
}

