<?php
get_header();
?>
<div id="wp_content">
   <?php get_sidebar() ?>
   <div class="content">
      <form action="">
         <h1>Danh sách </h1>
         <a href="<?php echo base_url('?mod=trademark&action=add_trademark') ?>" class="add_new">Thêm mới</a>
         <table>
            <thead>
               <tr>
                  <td>STT</td>
                  <td>Tên thương hiệu</td>
                  <td>Tên danh mục</td>
                  <td>Thao tác</td>
               </tr>
            </thead>
            <tbody>
               <?php
               if (!empty($list_trademark)) {
                  $t = 0;
                  foreach ($list_trademark as $trademark) {
                     $t++;
               ?>
                     <tr>
                        <td><?php echo $t;  ?></td>
                        <td><?php echo $trademark['name_trademark'];  ?></td>
                        <td><?php echo $trademark['name_cat'];  ?></td>
                        <td><a href="<?php echo base_url($trademark['url_update'])   ?>">SỬA</a>||<a href="<?php echo base_url($trademark['url_delete']) ?>">XÓA</a></td>
                     </tr>
               <?php
                  }
               } else {
                  echo "Hiện tại không có thương hiệu nào";
               }
               ?>

            </tbody>
         </table>
      </form>
   </div>
   <div class="clear_both"></div>

</div>
<?php
// get_footer();
?>