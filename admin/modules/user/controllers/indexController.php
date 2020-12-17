<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
    load('helper', 'data');
}

//select
function indexAction()
{
    $count_users = get_count_all_users();
    $num_user_page = 10;
    $total_page = ceil($count_users / $num_user_page);
    if (!empty($_GET['page'])) {
    } else {
        $_GET['page'] = 1;
    }
    $page = $_GET['page'];
    $start = ($page - 1) * $num_user_page;
    $list_user = get_list_user($start, $num_user_page);
    foreach ($list_user as &$user) {
        $user['url_update'] = "?mod=users&controller=index&action=update&id={$user['id_user']}";
        $user['url_delete'] = "?mod=users&controller=index&action=delete&id={$user['id_user']}";
    };
    // show_array($list_user);
   
    $count_user = get_count_user($start, $num_user_page);
    $data = array(
        'list_user' => $list_user,
        'start' => $start,
        'total_page' => $total_page,
        'page' => $page,
        'count_user' => $count_user,
    );
    // show_array($data);
    load('helper', 'pagging');
    load_view('index', $data);
}



