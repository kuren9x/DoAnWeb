<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}
function show_productAction()
{
    $list_product = get_list_product();
    foreach ($list_product as &$product) {
        $product['url_update'] = "?mod=product&action=update_product&id={$product['id_product']}";
        $product['url_delete'] = "?mod=product&action=delete_product&id={$product['id_product']}";
    };
    $data = array(
        'list_product' => $list_product
    );

    load_view('show_product', $data);
}
function add_productAction()
{
    global $error, $name_cat, $success, $name_trademark, $name_product, $price, $fullname, $upload_file, $file;
    $list_cat = get_list_cat();
    $list_trademark = get_list_trademark();
    if (isset($_POST['btn_add_product'])) {
        $error = array();
        $success = array();
        //name_product
        if (!empty($_POST['name_product'])) {
            $name_product = $_POST['name_product'];
        } else {
            $error['name_product'] = "Không được để trống";
        }
        //fullname
        if (!empty($_POST['fullname'])) {
            $fullname = $_POST['fullname'];
        } else {
            $error['fullname'] = "Không được để trống";
        }

        //price
        if (!empty($_POST['price'])) {
            $price = $_POST['price'];
        } else {
            $error['price'] = "Không được để trống";
        }
        //file upload
        // // duong dan file ipload
        if (!empty($_FILES['file']['name'])) {
            $upload_dir = 'public/img/';
            $upload_file = $upload_dir . $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];
            $file = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);

            //xu ly upload file anh
            $type_alow = array('jpg');
            //duoi file
            $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            // ktra duoi file
            if (!in_array(strtolower($type), $type_alow)) {
                $error['type'] = "chỉ được upload file có đuôi jpg";
            }
            
        } else {
            $error['file'] = "Không được để trống";
        }


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

        // if (check_exits_trademark($name_trademark, $name_cat)) {
        //     $error['exits_cat'] = "Thương hiệu đã tồn tại trên hệ thống";
        // }
        if (empty($error)) {
            $data = array(
                'fullname' => $fullname,
                'name_product' => $name_product,
                'price' => $price,
                'img_product' => $file,
                'id_trademark' => $name_trademark,
                'id_cat' => $name_cat
            );
            add_product($data);
            move_uploaded_file($tmp, $upload_file);

            $success['success'] = "Thêm sản phẩm thành cônng";
        }
    }
    $data = array(
        'list_trademark' => $list_trademark,
        'list_cat' => $list_cat,
        'success' => $success
    );
    load_view("add_product", $data);
}

function update_productAction()
{
    $id = (int) $_GET['id'];
    global $error, $name_cat, $success, $name_trademark, $name_product, $price, $fullname, $upload_file, $file;
    $list_cat = get_list_cat();
    $list_trademark = get_list_trademark();
    if (isset($_POST['btn_update_product'])) {
        $error = array();
        $success = array();
        //name_product
        if (!empty($_POST['name_product'])) {
            $name_product = $_POST['name_product'];
        } else {
            $error['name_product'] = "Không được để trống";
        }
        //fullname
        if (!empty($_POST['fullname'])) {
            $fullname = $_POST['fullname'];
        } else {
            $error['fullname'] = "Không được để trống";
        }
        //price
        if (!empty($_POST['price'])) {
            $price = $_POST['price'];
        } else {
            $error['price'] = "Không được để trống";
        }
        //file upload
        // // duong dan file ipload
        if (!empty($_FILES['file']['name'])) {
            $upload_dir = 'public/img/';
            $upload_file = $upload_dir . $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];
            $file = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);

            //xu ly upload file anh
            $type_alow = array('jpg');
            //duoi file
            $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            // ktra duoi file
            if (!in_array(strtolower($type), $type_alow)) {
                $error['type'] = "chỉ được upload file có đuôi jpg";
            }
        } else {
            $error['file'] = "Không được để trống";
        }


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

        // if (check_exits_trademark($name_trademark, $name_cat)) {
        //     $error['exits_cat'] = "Thương hiệu đã tồn tại trên hệ thống";
        // }
        if (empty($error)) {
            $data = array(
                'fullname' => $fullname,
                'name_product' => $name_product,
                'price' => $price,
                'img_product' => $file,
                'id_trademark' => $name_trademark,
                'id_cat' => $name_cat
            );
            update_product_id($data, $id);
            move_uploaded_file($tmp, $upload_file);

            $success['success'] = "Cập nhật sản phẩm thành cônng";
        }
    }
    $data = array(
        'list_trademark' => $list_trademark,
        'list_cat' => $list_cat,
        'success' => $success
    );
    load_view("update_product", $data);
}
function delete_productAction()
{
    $id = (int) $_GET['id'];
    delete_product_id($id);
    redirect_to(base_url("?mod=product&action=show_product"));
}
