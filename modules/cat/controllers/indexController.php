<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function show_catAction()
{
    $id = (int) $_GET['id'];
    $get_cat_id = get_cat_id($id);
    $list_cat_product = get_list_cat_product($id);


    $data = array(
        'cat' => $get_cat_id,
        'list_cat_product' => $list_cat_product
    );

    load_view('show_cat', $data);
}
