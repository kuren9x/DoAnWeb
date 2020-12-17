<?php
   get_header();
?>

<script>
   
</script>

<div id="wp-content">

   <div class="container">
      <div class="row">

         <div id="content">
            <div class="box-body" style="display:flex;position:relative;left:200px">.

               <table width="auto" border="1" cellpadding="0" cellspacing="0">
                  <tr>
                     <td colspan="2" height="50px">
                        <div align="center">Chi tiết sản phẩm</div>
                     </td>
                  </tr>
                  <tr>
                     <td rowspan="2" style="width:300px"> <img src="admin/public/img/<?php echo $detail_product['img_product'] . '.jpg' ?>" width="100%" height="auto" /></td>
                     <td width="150px">
                        <div align="center">Tên sản phẩm: </div>
                        <div style="text-align: center;"><?php echo $detail_product['fullname'] ?> </div>
                     </td>
                  </tr>
                  <tr>
                     <td style="color:#F00">
                           <?php $numOrder = 1; ?>
                        <div align="center">Giá: <?php echo currency_format($detail_product['price'] * $numOrder ) ?> </div>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2" height="100px">
                        <div class="detail_product">

                           <form action="<?php echo base_url($detail_product['url']) ?>" method="post">
                              <a id="descrease" onclick="">-</a>

                              <input type="text" id="num_order" name="num_order[]" value="1" class="num_order">

                              <a id="increase" >+</a>
                              <input class="btn btn-success" name="giohang" type="submit" value="ADD TO CART" style="margin-left: 35px;" />
                           </form>

                        </div>
                     </td>
                  </tr>

               </table>

            </div>
            <!-- end box-body -->
            <!-- end new post  -->
            <!-- end box -->
         </div>
         <!-- end content -->

      </div>

   </div>
</div>
<?php
get_footer();
?>