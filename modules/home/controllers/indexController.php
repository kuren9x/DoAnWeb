<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function indexAction()
{
    $num_product_page = 8;
    $count_all_product = count_all_product();
    $total_page = ceil($count_all_product / $num_product_page);
    if (!empty($_GET['page'])) {
    } else {
        $_GET['page'] = 1;
    };
    $page = $_GET['page'];
    $star = ($page - 1) * $num_product_page;

    $list_product = get_list_product($star, $num_product_page);
    $data = array(
        'page' => $page,
        'total_page' => $total_page,
        'list_product' => $list_product
    );

    load_view('index', $data);
}

function addAction()
{
    echo "Thêm dữ liệu";
}

// function editAction() {
//     $id = (int)$_GET['id'];
//     $item = get_user_by_id($id);
//     show_array($item);
// }
