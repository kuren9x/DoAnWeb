<?php
get_header();
?>
<div id="wp_content">
   <?php get_sidebar() ?>
   <div class="content">
      <form action="">
         <h1>Danh sách </h1>
         <a href="<?php echo base_url('?mod=product&action=add_product') ?>" class="add_new">Thêm mới</a>
         <table>
            <thead>
               <tr>
                  <td>STT</td>
                  <td>Tên sản phẩm</td>
                  <td>fullname</td>
                  <td>Giá</td>
                  <td>Hình ảnh</td>
                  <td>Tên thương hiệu</td>
                  <td>Tên danh mục</td>
                  <td>Thao tác</td>
               </tr>
            </thead>
            <tbody>


               <?php
               if (!empty($list_product)) {
                  $t = 0;
                  foreach ($list_product as $product) {
                     $t++;
               ?>
                     <tr>
                        <td><?php echo $t;  ?></td>
                        <td><?php echo $product['name_product']  ?></td>
                        <td><?php echo $product['fullname']  ?></td>
                        <td><?php echo currency_format($product['price'])  ?></td>
                        <td><img src="public/img/<?php echo $product['img_product'] . '.jpg' ?>" alt="" style="width:10%"></td>
                        <td><?php echo $product['name_trademark'];  ?></td>
                        <td><?php echo $product['name_cat'];  ?></td>
                        <td><a href="<?php echo base_url($product['url_update'])   ?>">SỬA</a>||<a href="<?php echo base_url($product['url_delete']) ?>">XÓA</a></td>
                     </tr>
               <?php
                  }
               } else {
                  echo "Hiện tại không có danh mục nào";
               }
               ?>

            </tbody>
         </table>
      </form>
   </div>
   <div class="clear_both"></div>

</div>
<?php
get_footer();
?>