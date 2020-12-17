<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function add_cartAction()
{
    $id = (int) $_GET['id'];

    $list_num_order = $_POST['num_order'];
    foreach ($list_num_order as $value => $num_order) {
    };

    add_cart($id, $num_order);
    redirect_to(base_url("?mod=cart&action=show_cart"));
    // load_view('add_cart');
}

function show_cartACtion()
{
    // show_array($_SESSION);
    load_view('show_cart');
}

function delete_cartAction()
{
    $id = (int) $_GET['id'];
    delete_cart($id);
    redirect_to(base_url(("?mod=cart&action=show_cart")));
}
// function delete_allAction()
// {
//     delete_cart_all();
//     redirect_to(base_url(("?mod=cart&action=show_cart")));
// }

function checkoutAction()
{
    global $list_user, $error, $phone, $address;
    $transaction_code = rand(55555, 9999999);
    $time = time();

    $list_user = get_list_user();
    $fullname = info_user(user_login(), 'fullname');
    $email = info_user(user_login(), 'email');
    $id_user = info_user(user_login(), 'id_user');
    $username = info_user(user_login(), 'username');
    $list_cart = get_list_cart();
    $total_all = get_total_cart();
    $data = array(
        'list_cart' => $list_cart,
        'fullname' => $fullname,
        'email' => $email,
        'total_all' => $total_all
    );

    if (isset($_POST['btn_order'])) {

        if (!empty($_POST['phone'])) {
            if (!(strlen($_POST['phone']) == 10 || strlen($_POST['phone']) == 11)) {
                $error['phone'] = "Ký tự không đúng định dạng SĐT";
            } else {
                if (is_phone($_POST['phone'])) {
                    $phone = $_POST['phone'];
                } else {
                    $error['phone'] = "Ký tự không đúng định dạng SĐT";
                }
            }
        } else {
            $error['phone'] = "Không được để trống";
        }

        if (!empty($_POST['address'])) {
            if (!(strlen($_POST['address']) >= 10)) {
                $error['address'] = "Ký tự không đúng định dạng ";
            } else {
                $address = $_POST['address'];
            }
        } else {
            $error['address'] = "Không được để trống";
        }

        $payment = $_POST['payment'];
        if (empty($error)) {
            $stt = 0;
            $body = "";
            foreach ($list_cart as &$item) {
                $stt++;
                $data_order = array(
                    'transaction_code' => $transaction_code,
                    'price' => $item['price'],
                    'number_product' => $item['number_product'],
                    'id_product' => $item['id'],
                    'name_product' => $item['name_product'],
                    'img_product' => $item['img_product'],
                    'total_product' => $item['total_product']
                );

                add_order($data_order);
            };
            $data_transaction = array(
                'transaction_code' => $transaction_code,
                'address' => $address,
                'phone' => $phone,
                'fullname' => $fullname,
                'mail' => $email,
                'total_number_product' => $total_all['total_number_product'],
                'total' => $total_all['total'],
                'payment' => $payment,
                'date' => $time,
                'id_user' => $id_user,
                'username' => $username,
            );
            add_transaction($data_transaction);


            redirect_to(base_url("?mod=cart&action=thank"));
        }
    }
    load_view('checkout', $data);
}

function thankAction()
{
    unset($_SESSION['cart']);
    load_view('thank');
}
//ajax
function update_cart_ajaxAction()
{
    // load('helper', 'format');
    // load_view("update_cart_ajax");
    $id = $_POST['id'];
    $number_product = $_POST['number_product'];
    $item = get_detail_product($id);
    // show_array($item);
    // show_array($_POST);
    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {

        //cập nhật số lượng
        $_SESSION['cart']['buy'][$id]['number_product'] = $number_product;

        //cập nhật tiền trên mỗi sản phẩm
        $total_product = $number_product * $item['price'];
        $_SESSION['cart']['buy'][$id]['total_product'] = $total_product;

        //cập nhật toàn bộ giỏ hàng
        update_total_cart();

        //lấy tổng giá trị giỏ hàng
        $total = get_total_cart();
        // echo currency_format($total_product);
        // echo currency_format($total['total']);
        //giá trị trả về 
        $result = array(
            'total_product' => currency_format($total_product),
            'total' => currency_format($total['total']),
            // 'total_number_product' => $total['total_number_product'],
        );
        echo json_encode($result);
    }
}
function show_cart_ajaxAction()
{
    $output = "";
    $list_cart = get_list_cart();
    $total_cart = get_total_cart();


    $total_cart_total = currency_format($total_cart['total']);
    $checkout = base_url("?mod=cart&action=checkout");
    $login = base_url("?mod=login&action=login");
    $delete_all = base_url("?mod=cart&action=delete_all");
    $home = base_url("?mod=home");
    if (!empty($list_cart)) {
        $output .= "
<table class='table'>
<thead>
    <tr>
        <td>STT</td>
        <td>Ảnh sản phẩm</td>
        <td>Tên sản phẩm</td>
        <td>Số lượng</td>
        <td>Giá </td>
        <td>Thành tiền </td>
         
        <td></td>
        <td>Thương Hiệu</td>
    </tr>
</thead>
";
        $output .= "<tbody>";
        $t = 0;
        foreach ($list_cart as $cart) {
            $t++;
            $id = $cart['id'];
           
            $img_product = 'admin/public/img/' . $cart['img_product'] . '.jpg';
            $url_product_detail = base_url($cart['url_product_detail']);
            $name_product = $cart['name_product'];
            $number_product = $cart['number_product'];
            $price = currency_format($cart['price']);
            $total_product = currency_format($cart['total_product']);
            //them 
            $name_trademark = $cart['name_trademark'];
            $name_cat = $cart['name_cat'];
            $output .= "

            <tr>
            <td> $t </td>
            <td><img src='$img_product' width='100' height='100'></td>
            <td><a href='$url_product_detail'> $name_product</a></td>
            <td>
            
                <input type='text' data_id='$id' name='number_product' id='num_order_$id' class='num_order' value='$number_product' disabled>
                
            </td>
            <td>$price</td>
            <td id='total_product_$id'>$total_product</td>
            <td><a delete_id='$id' id='delete_id'> <img src='public/Img/delete.png' alt='' width='20' height='20' style='cursor:pointer'></a></td>
            
            <td>$name_trademark</td>
            
            
           
            </tr>
";
        }
        $output .= "<tbody>";



        $output .= "
<tfoot>
<tr>
    <!-- <td><a href='$delete_all'>Xoá toàn bộ</a></td> -->
    <td></td>
    <td></td>
    <td></td>
    <td>
        <p>
            Tổng tiền: <span id='total_ajax'>
               $total_cart_total
            </span>
        </p>
    </td>
    ";

        if (is_login()) {
            $output .= "
        <td><a href='$checkout' class='btn btn-success'>Thanh toán</a></td>";
        } else {
            $output .= "
        <td><a href='$login' class='btn btn-success'>Bạn cần phải đăng nhập để thanh toán</a></td>";
        }
        $output .= "
</tr>
</tfoot>
";

        $output .= "
        </table>
        ";
    } else {
        $output .= "
        <div>
        <p>Giỏ hàng của bạn trống</p>
        <p>Mời quay lại để <span><a href='$home'> mua hàng</a></span></p>
    </div>
   ";
    };

    echo $output;
}
function delete_id_ajaxAction()
{
    $id = $_POST['id'];
    delete_cart($id);
    // redirect_to(base_url(("?mod=cart&action=show_cart")));
}
