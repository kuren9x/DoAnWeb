<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function detail_productAction()
{
    $id = (int)$_GET['id'];
    $detail_product = get_detail_product($id);
    $detail_product['url'] = "?mod=cart&action=add_cart&id={$detail_product['id_product']}";
    $data = array(
        'detail_product' => $detail_product
    );
    load_view('detail_product', $data);
}
