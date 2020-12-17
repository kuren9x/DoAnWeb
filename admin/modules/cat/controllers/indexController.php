<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}
function show_catAction()
{
    $list_cat = get_list_cat();
    foreach ($list_cat as &$cat) {
        $cat['url_update'] = "?mod=cat&action=update_cat&id={$cat['id_cat']}";
        $cat['url_delete'] = "?mod=cat&action=delete_cat&id={$cat['id_cat']}";
    };
    $data = array(
        'list_cat' => $list_cat
    );
    load_view('show_cat', $data);
}
function add_catAction()
{
    global $error, $name_cat, $success;
    if (isset($_POST['btn_add_cat'])) {
        $error = array();
        $success = array();
        //name_cat
        if (!empty($_POST['name_cat'])) {
            $name_cat = $_POST['name_cat'];
        } else {
            $error['name_cat'] = "Không được để trống";
        }
        if (check_exits_cat($name_cat)) {
            $error['exits_cat'] = "Danh mục đã tồn tại trên hệ thống";
        }
        if (empty($error)) {
            $data = array(
                'name_cat' => $name_cat
            );
            add_cat($data);
            $success['success'] = "Thêm danh mục thành cônng";
        }
    }
    load_view("add_cat", $success);
}

function update_catAction()
{
    $id = (int)$_GET['id'];
    global $error, $name_cat, $success;
    if (isset($_POST['btn_update_cat'])) {
        $error = array();
        $success = array();
        //name_cat
        if (!empty($_POST['name_cat'])) {
            $name_cat = $_POST['name_cat'];
        } else {
            $error['name_cat'] = "Không được để trống";
        }
        if (check_exits_cat($name_cat)) {
            $error['exits_cat'] = "Danh mục đã tồn tại trên hệ thống";
        }
        if (empty($error)) {
            $data = array(
                'name_cat' => $name_cat
            );
            update_cat_id($data,$id);
            $success['success'] = "Cập nhật danh mục thành cônng";
        }
    }
    load_view("update_cat", $success);
}
function delete_catAction()
{
    $id = (int)$_GET['id'];
    delete_cat_id($id);
    redirect_to(base_url("?mod=cat&action=show_cat"));
}
