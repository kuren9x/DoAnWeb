<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}
function show_trademarkAction()
{
    $list_trademark = get_list_trademark();
    foreach ($list_trademark as &$trademark) {
        $trademark['url_update'] = "?mod=trademark&action=update_trademark&id={$trademark['id_trademark']}";
        $trademark['url_delete'] = "?mod=trademark&action=delete_trademark&id={$trademark['id_trademark']}";
    };
    $data = array(
        'list_trademark' => $list_trademark
    );
    load_view('show_trademark', $data);
}
function add_trademarkAction()
{
    global $error, $name_cat, $success, $name_trademark;
    $list_cat = get_list_cat();
    if (isset($_POST['btn_add_trademark'])) {
        $error = array();
        $success = array();
        //name_cat
        if (!empty($_POST['name_cat'])) {
            $name_cat = $_POST['name_cat'];
        } else {
            $error['name_cat'] = "Không được để trống";
        }
        //trademark
        if (!empty($_POST['name_trademark'])) {
            $name_trademark = $_POST['name_trademark'];
        } else {
            $error['name_trademark'] = "Không được để trống";
        }
        if (check_exits_trademark($name_trademark, $name_cat)) {
            $error['exits_cat'] = "Thương hiệu đã tồn tại trên hệ thống";
        }
        if (empty($error)) {
            $data = array(
                'name_trademark' => $name_trademark,
                'id_cat' => $name_cat
            );
            add_trademark($data);
            $success['success'] = "Thêm thương hiệu thành cônng";
        }
    }
    $data = array(
        'list_cat' => $list_cat,
        'success' => $success
    );
    load_view("add_trademark", $data);
}

function update_trademarkAction()
{
    $id = (int)$_GET['id'];
    global $error, $name_cat, $success, $name_trademark;
    $list_cat = get_list_cat();
    if (isset($_POST['btn_update_trademark'])) {
        $error = array();
        $success = array();
        //name_cat
        if (!empty($_POST['name_cat'])) {
            $name_cat = $_POST['name_cat'];
        } else {
            $error['name_cat'] = "Không được để trống";
        }
        //trademark
        if (!empty($_POST['name_trademark'])) {
            $name_trademark = $_POST['name_trademark'];
        } else {
            $error['name_trademark'] = "Không được để trống";
        }
        if (check_exits_trademark($name_trademark, $name_cat)) {
            $error['exits_cat'] = "Thương hiệu đã tồn tại trên hệ thống";
        }
        if (empty($error)) {
            $data = array(
                'name_trademark' => $name_trademark,
                'id_cat'=>$name_cat
            );
            update_trademark_id($data, $id);
            $success['success'] = "Cập nhật danh mục thành cônng";
        }
    }
    $data = array(
        'list_cat' => $list_cat,
        'success' => $success
    );
    load_view("update_trademark", $data);
}
function delete_trademarkAction()
{
    $id = (int)$_GET['id'];
    delete_trademark_id($id);
    redirect_to(base_url("?mod=trademark&action=show_trademark"));
}
