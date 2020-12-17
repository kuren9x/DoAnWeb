<?php
get_header();
?>
<div id="wp_content">
   <?php get_sidebar() ?>
   <div class="content">
      <form  method="POST" enctype="multipart/form-data">
         <h1>Thêm sản phẩm</h1>
         <table>
            <thead>
               <tr>

               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>Tên sản phẩm</td>
                  <td><input type="text" name="name_product" id="" value="<?php set_value('name_product') ?>">
                     <p class="error"><?php echo form_error('name_product') ?></p>

                  </td>
               </tr>
               <tr>
                  <td>fullname</td>
                  <td><input type="text" name="fullname" id="" value="<?php set_value('fullname') ?>">
                     <p class="error"><?php echo form_error('fullname') ?></p>

                  </td>
               </tr>
               <tr>
                  <td>Giá sản phẩm</td>
                  <td><input type="text" name="price" id="" value="<?php set_value('price') ?>">
                     <p class="error"><?php echo form_error('price') ?></p>
                  </td>

               </tr>
               <tr>
                  <td>Hình ảnh </td>
                  <td><input type="file" name="file" id="">
                     <p class="error"><?php echo form_error('file_exist') ?></p>
                     <p class="error"><?php echo form_error('type') ?></p>
                     <p class="error"><?php echo form_error('file') ?></p>
                  </td>

               </tr>
               <tr>
                  <td>Danh mục sản phẩm</td>
                  <td>
                     <select name="name_cat" id="" style="width:30%">
                        <option value="">chọn danh mục</option>
                        <?php
                        if (!empty($list_cat)) {
                           foreach ($list_cat as $cat) {
                        ?>
                              <option value="<?php echo $cat['id_cat'] ?>"> <?php echo $cat['name_cat'] ?></option>
                        <?php
                           }
                        }
                        ?>
                     </select>
                     <p class="error"><?php echo form_error('name_cat') ?></p>
                  </td>
               </tr>
               <tr>
                  <td>Thương hiệu sản phẩm</td>
                  <td>
                     <select name="name_trademark" id="" style="width:30%">
                        <option value="">chọn thương hiệu</option>
                        <?php
                        if (!empty($list_trademark)) {
                           foreach ($list_trademark as $trademark) {
                        ?>
                              <option value="<?php echo $trademark['id_trademark'] ?>"> <?php echo $trademark['name_trademark'] ?></option>
                        <?php
                           }
                        }
                        ?>
                     </select>
                     <p class="error"><?php echo form_error('name_trademark') ?></p>
                  </td>
               </tr>

            </tbody>
            <tfoot>
               <tr>
                  <td colspan="2">
                     <input type="submit" name="btn_add_product" id="" value="Thêm">
                     <p class="error">
                        <?php
                        //  echo form_error('exits_cat') 
                         ?>
                  </p>

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