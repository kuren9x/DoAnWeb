<?php
get_header();
?>
<div id="wp_content">
   <?php get_sidebar() ?>
   <div class="content">
      <form action="">
         <h1>Danh sách </h1>
         <a href="<?php echo base_url('?mod=cat&action=add_cat') ?>" class="add_new">Thêm mới</a>
         <table>
            <thead>
               <tr>
                  <td>STT</td>
                  <td>Tên</td>
                  <td>Thao tác</td>
               </tr>
            </thead>
            <tbody>
               <?php
               if (!empty($list_cat)) {
                  $t = 0;
                  foreach ($list_cat as $cat) {
                     $t++;
               ?>
                     <tr>
                        <td><?php echo $t;  ?></td>
                        <td><?php echo $cat['name_cat'];  ?></td>
                        <td><a href="<?php echo base_url($cat['url_update'])   ?>">SỬA</a>||<a href="<?php echo base_url($cat['url_delete']) ?>">XÓA</a></td>
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