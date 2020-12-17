<?php
get_header();
?>
<div id="wp_content">
    <?php get_sidebar() ?>
    <div class="content">
        <form action="" method="POST">
            <h1>Thêm danh mục</h1>
            <table>
                <thead>
                    <tr>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>
                            <input type="text" name="name_cat" id="" placeholder="nhập tên danh mục">
                            <p class="error"><?php echo form_error('name_cat') ?></p>
                        </td>

                    </tr>

                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            <input type="submit" name="btn_add_cat" id="" value="Thêm">
                            <p class="error"><?php echo form_error('exits_cat') ?></p>

                            <?php if (!empty($success)) {
                            ?>
                                <p class="success"><?php echo $success ?></p>
                            <?php } ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
    <div class="clear_both"></div>
</div>
<?php
get_footer();
?>