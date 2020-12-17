<?php
get_header();
?>
<div id="wp_content">
    <?php get_sidebar() ?>
    <div class="content">
        <h1>Chi tiết danh mục</h1>

        <p>Mã đơn hàng: <strong>#<?php echo $transaction['transaction_code'] ?></strong></p>
        <p>Tên khách hàng: <strong><?php echo $transaction['fullname'] ?></strong></p>
        <p>Địa chỉ giao hàng: <strong><?php echo $transaction['address'] ?></strong></p>
        <p>Số điện thoại: <strong><?php echo $transaction['phone'] ?></strong></p>
        <p>mail: <strong><?php echo $transaction['mail'] ?></strong></p>
        <form action="" method="POST">
            <div style="display: flex;margin-top:20px;margin-bottom:20px">
                <select name="status" id="" style=" width:20%;">
                    <option value="<?php echo $transaction['status'] ?>" selected="selected"><?php echo $show_status[$transaction['status']] ?></option>
                    <option value="0">------------</option>
                    <option value="0">Chờ duyệt</option>
                    <option value="1">Đang vận chuyển</option>
                    <option value="3">Thành công</option>
                </select>
                <input type="submit" name="btn_status" value="Cập nhật" style="margin-left:0;width:10%">
                <p style="color: red;margin-left:20px">
                    <?php
                    if (!empty($success)) {
                        echo $success['success'];
                    }
                    ?>
                </p>

            </div>
        </form>
        <table>
            <thead>
                <tr>
                    <td>STT</td>
                    <td>Tên Sản phẩm</td>
                    <td>Hình ảnh</td>
                    <td>Giá</td>  
                    <td>Số lượng</td>
                    <td>Thành tiền</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $stt = 0;
                foreach ($list_order as $item) {
                    $stt++;
                ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $item['name_product'] ?></td>
                        <td><img src="public/img/<?php echo $item['img_product'] . '.jpg' ?>" alt="" width="100" height="100"></td>
                        <td><?php echo currency_format($item['price']) ?></td>
                        <td><?php echo $item['number_product'] ?></td>
                        <td><?php echo $item['total_product'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Tổng só lượng: <strong><?php echo $transaction['total_number_product'] ?></strong></td>
                    <td colspan="3">Tổng tiền: <strong>#<?php echo $transaction['total'] ?></strong></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="clear_both"></div>
</div>
<?php
get_footer();
?>