<?php
get_header()
?>
<div id="wp-content">
    <div class="container" style="display: block;">

        <?php
        foreach ($transaction as $item) {
        ?>

            <table style="width:100%; text-align:center;" border="1" class="mt-3">

                <thead>
                    <tr>
                        <td colspan="4">Mã đơn hàng: <strong><?php echo $item['transaction_code'] ?></strong></td>
                    </tr>
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td>Hình ảnh</td>
                        <td>Giá</td>
                        <td>Số lượng</td>
                        <td>Thành tiền</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $transaction_code = $item['transaction_code'];
                    $list_order = get_list_order($transaction_code);
                    foreach ($list_order as $order) {
                    ?>
                        <tr>
                            <td><?php echo $order['name_product'] ?></td>
                            <td> <img src="admin/public/img/<?php echo $order['img_product'] ?>.jpg" width="100" height="100" alt=""></td>
                            <td><?php echo $order['price'] ?></td>
                            <td> <?php echo $order['number_product'] ?></td>
                            <td><?php echo $order['total_product'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>

                    <tr>
                        <td>Ngày đặt:<strong><?php echo time_format($item['date']) ?></strong></td>
                        <td>Địa chỉ: <strong><?php echo $item['address'] ?></strong> </td>
                        <td>Phone <strong><?php echo $item['phone'] ?></strong></td>
                        <td>Tổng số lượng: <strong><?php echo $item['total_number_product'] ?></strong></td>
                        <td colspan="">Tổng tiền: <strong><?php echo $item['total'] ?></strong></td>
                    </tr>
                    <tr>
                        <td colspan="5">Đơn hàng sẽ được giao trong 3 ngày</td>
                    </tr>
                </tbody>
            </table>

        <?php
        }
        ?>

    </div>
</div>
<?php
get_footer()
?>