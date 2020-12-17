<?php
get_header();
?>
<div id="wp_content">
    <?php get_sidebar() ?>
    <div class="content">
        <form action="" method="POST">
            <h1>Thêm thương hiệu</h1>
            <table>
                <thead>
                    <tr>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>
                            <input type="text" name="name_trademark" id="" placeholder="nhập tên thương hiệu">
                            <p class="error"><?php echo form_error('name_trademark') ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select name="name_cat" id="" style="width:30%">
                                <option value="">chọn danh mục</option>
                                <?php
                                if (!empty($list_cat)) {
                                    foreach ($list_cat as $cat) {
                                ?>
                                        <option value="<?php echo $cat['id_cat']?>" > <?php echo $cat['name_cat'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <p class="error"><?php echo form_error('name_cat') ?></p>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            <input type="submit" name="btn_add_trademark" id="" value="Thêm">
                            <p class="error"><?php echo form_error('exits_cat') ?></p>

                            <?php if (!empty($success)) {
                            ?>
                                <p class="success"><?php echo $success['success'] ?></p>
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