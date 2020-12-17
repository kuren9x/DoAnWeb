<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}
function indexAction()
{
    $list_transaction = get_list_transaction();
    foreach ($list_transaction as &$item) {
        $item['url_detail'] = "?mod=cart&action=detail_cart&transaction_code={$item['transaction_code']}";
        $item['url_delete'] = "?mod=cart&action=delete_cart&id_order={$item['id_order']}";
    };
    $show_status = array(
        '0' => 'Chờ duyệt',
        '1' => 'Đang vận chuyển',
        '2' => 'Thành công'
    );
    $is_active = array(
        '1' => 'Đã xác nhận'
    );
    $data = array(
        'is_active' => $is_active,
        'show_status' => $show_status,
        'list_transaction' => $list_transaction
    );
    load_view('index', $data);
}


function detail_cartAction()
{
    $transaction_code = (int)$_GET['transaction_code'];
    global  $success;
    $show_status = array(
        '0' => 'Chờ duyệt',
        '1' => 'Đang vận chuyển',
        '2' => 'Thành công'
    );
    if (isset($_POST['btn_status'])) {
        //name_cat
        $status = $_POST['status'];
        $update_status = array(
            'status' => $status
        );
        updadte_status_transaction($update_status, $transaction_code);
        $success['success'] = "Cập nhật trạng thái thành công";
    }

    $list_transaction_code = get_list_transaction_code($transaction_code);
    $list_order = get_list_order($transaction_code);
    $data = array(
        'list_order' => $list_order,
        'transaction' => $list_transaction_code,
        'show_status' => $show_status,
        'success' => $success
    );
    load_view("detail_cart", $data);
}
function delete_cartAction()
{
    $id = (int)$_GET['id_order'];
    delete_transaction_id($id);
    redirect_to(base_url("?mod=cart"));
}
