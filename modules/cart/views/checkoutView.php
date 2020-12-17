<?php
get_header()
?>
<div id="wp-content">
    <div class="container">
        <form action="" method="POST">
            <div id="checkout">
                <div id="info_user">
                    <h3>Điền thông tin</h3>

                    <p id="fullname"><?php echo $fullname  ?></p>
                    <p id="mail"><?php echo $email ?></p>
                    <input type="text" name="phone" id="phone" placeholder="Nhập SĐT" value="<?php echo set_value('phone') ?>">
                    <p style="color: red;"> <?php echo form_error('phone') ?> </p>
                    <input type="text" name="address" id="address" placeholder="Nhập địa chỉ" value="<?php echo set_value('address') ?>">
                    <p style="color: red;"><?php echo form_error('address') ?></p>
                </div>
                <div id="info_cart">
                    <h3>Đơn hàng</h3>
                    <?php
                    foreach ($list_cart as $item) {
                    ?>
                        <p><?php echo $item['name_product'] . ' ' ?>(X <?php echo $item['number_product'] ?>) <span class="font-weight-bold">: <?php echo ' ' . currency_format($item['total_product']) ?></span></p>

                    <?php
                    }
                    ?>
                    <hr>
                    <p>Tổng tiền <span class="font-weight-bold">:<?php echo ' ' . currency_format($total_all['total']) ?></span></p>
                    <span><input type="radio" name="payment" id="" value="cod" checked="checked"> Thanh toán tại nhà</span>
                    <input type="submit" name="btn_order" value="Đặt hàng" class="btn btn-success">
                </div>
            </div>
   
        </form>
    </div>
</div>


<?php
get_footer()
?>