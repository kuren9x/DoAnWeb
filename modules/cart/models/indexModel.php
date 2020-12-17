<?php

function get_list_user()
{
    $list_user = db_fetch_array("select * from tbl_user");
    return $list_user;
}
function get_detail_product($id)
{
    $detail_product = db_fetch_row("select * from tbl_product where id_product='$id'");
    return $detail_product;
}


///////them 
function get_trademark_product($id_product_trademark)
{
    $trademark_product = db_fetch_row("select * from tbl_trademark where id_trademark='$id_product_trademark'");
    return $trademark_product;
}
function get_cat_product($id_cat_trademark)
{
    $cat_product = db_fetch_row("select * from tbl_cat where id_cat='$id_cat_trademark'");
    return $cat_product;
}
///



function add_cart($id, $num_order)
{
    $item = get_detail_product($id);

    ///them 
    $item_trademark=get_trademark_product($item['id_trademark']);
    $item_cat=get_cat_product($item['id_cat']);
    ///

    $number_product = $num_order;

    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
        $number_product = $_SESSION['cart']['buy'][$id]['number_product'] + $number_product;
    }
    $_SESSION['cart']['buy'][$id] = array(
        'id' => $item['id_product'],
        // 'url_product_detail' => $item['url_product_detail'],
        'name_product' => $item['name_product'],
        'price' => $item['price'],
        'img_product' => $item['img_product'],
        'number_product' => $number_product,
        'total_product' => $item['price'] * $number_product,

        ///them
        'name_trademark'=>$item_trademark['name_trademark'],
        'name_cat'=>$item_cat['name_cat']
        ////

        
    );
    update_total_cart();
}
function update_total_cart()
{
    if (isset($_SESSION['cart'])) {
        $total_number_product = 0;
        $total = 0;
        foreach ($_SESSION['cart']['buy'] as $item_total) {
            $total_number_product += $item_total['number_product'];
            $total += $item_total['total_product'];
        }
        $_SESSION['cart']['total'] = array(
            'total_number_product' => $total_number_product,
            'total' => $total,
        );
    }
}
function get_list_cart()
{
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart']['buy'] as &$item1) {
            $item1['url_delete_cart'] = "?mod=cart&action=delete_cart&id={$item1['id']}";
            $item1['url_product_detail'] = "?mod=product&action=detail_product&id={$item1['id']}";
        }
        return $_SESSION['cart']['buy'];
    }
}
function get_total_cart()
{
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart']['total'];
    }
}
function delete_cart($id)
{
    if (isset($_SESSION['cart'])) {
        if (!empty($id)) {
            unset($_SESSION['cart']['buy'][$id]);
            update_total_cart();
        }
    }
};
function delete_cart_all()
{
    if (isset($_SESSION['cart'])) {
        unset($_SESSION['cart']);
        update_total_cart();
    }
};

function update_cart()
{
    if (isset($_POST['update_cart'])) {
        $number_product = $_POST['number_product'];
        foreach ($number_product as $id => $new_number_product) {
            $_SESSION['cart']['buy'][$id]['number_product'] = $new_number_product;
            $_SESSION['cart']['buy'][$id]['total_product'] = $new_number_product * $_SESSION['cart']['buy'][$id]['price'];
        }
        update_total_cart();
    }
}

function add_order($data_order)
{
    db_insert('tbl_order', $data_order);
}
function add_transaction($data_transaction)
{
    db_insert('tbl_transaction', $data_transaction);
}
    
