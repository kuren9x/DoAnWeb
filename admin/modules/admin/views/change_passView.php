<?php
get_header();
?>
<div id="wp_content">
    <?php get_sidebar('login') ?>
    <div class="content">
        <h3 style="margin:20px 0px">Thay đổi mật khẩu</h3>
        <form action="" method="POST">
            <input type="password" id="old_password" name="old_password" placeholder="Nhập lại mât khẩu cũ">
            <p class="error"><?php echo form_error('old_password') ?></p>
            <!-- new_password  -->
            <input type="password" id="new_password" name="new_password" placeholder="Nhập mật khẩu mới">
            <p class="error"><?php echo form_error('new_password') ?></p>
            <!-- re_password -->
            <input type="password" id="re_password" name="re_password" placeholder="Nhập lại mật khẩu mới">
            <p class="error"><?php echo form_error('re_password') ?></p>

            <input type="submit" value="Cập nhật" name="btn_change_pass" id="btn_update">
            <p class="error"><?php echo form_error('account') ?></p>

            <?php if (!empty($success)) {
            ?>
                <p><?php echo $success ?></p>
            <?php } ?>
        </form>
    </div>

</div>
<?php
get_footer();
?>