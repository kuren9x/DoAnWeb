<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function show_trademarkAction()
{
    $id = (int)$_GET['id'];
    $get_trademark_id = get_trademark_id($id);
    $list_trademark_product = get_list_trademark_product($id);

    $data = array(
 
        'trademark' => $get_trademark_id,
        'list_trademark_product' => $list_trademark_product
    );
    load_view('show_trademark', $data);
}
