<?php
get_header();
?>
<div id="wp_content">
   <?php get_sidebar() ?>
   <div class="content">
      <form action="">
         <h1>Danh sách đơn hàng</h1>
         <table>
            <thead>
               <tr>
                  <td>STT</td>
                  <td>Mã đơn hàng</td>
                  <td>Tên khách hàng </td>
                  <td>Thanh toán</td>
                  <td>Số lượng</td>
                  <td>Tổng tiền</td>
                  <td>Trạng thái</td>
                  <td>Ngày đặt hàng</td>
                  <td>Xác nhận đơn hàng</td>
               </tr>
            </thead>
            <tbody>
               <?php
               if (!empty($list_transaction)) {
                  $t = 0;
                  foreach ($list_transaction as $item) {
                     $t++;
               ?>
                     <tr>
                        <td><?php echo $t;  ?></td>
                        <td><?php echo $item['transaction_code'];  ?></td>
                        <td><?php echo $item['fullname'];  ?></td>
                        <td><?php echo $item['payment'];  ?></td>
                        <td><?php echo $item['total_number_product'];  ?></td>
                        <td><?php echo currency_format($item['total']);  ?></td>
                        <td><?php echo $show_status[$item['status']];  ?></td>
                        <td><?php echo time_format($item['date']);  ?></td>
                        <td><?php echo $is_active[$item['is_active']] ?></td>
                        <td><a href="<?php echo base_url($item['url_detail']) ?>">Chi tiết</a>||<a href="<?php echo base_url($item['url_delete']) ?>"> XÓA</a></td>
                        <td></td>
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
      <div id="load_data">

      </div>
   </div>
   <div class="clear_both"></div>

</div>
<?php
get_footer();
?>