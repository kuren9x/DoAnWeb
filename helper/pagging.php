<?php

function get_pagging($page, $total_page, $base_url = "")
{
    $pagging = "<ul class='pagging'>";
    if ($page > 1) {
        $page_prev = $page - 1;
        $pagging .= "<li><a href='$base_url&page=$page_prev'> <<< </a></li>";
    }
    for ($i = 1; $i <= $total_page; $i++) {
        $active = "";
        if ($i == $page) {
            $active = "active";
        }
        $pagging .= "<li class='$active '><a href='$base_url&page=$i'>$i</a></li>";
    }

    if ($page < $total_page) {
        $page_next = $page + 1;
        $pagging .= "<li><a href='$base_url&page=$page_next'> >>> </a></li>";
    }
    $pagging .= "</ul>";
    echo $pagging;
}
