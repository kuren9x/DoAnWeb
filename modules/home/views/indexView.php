<?php
get_header();
?>
<?php
get_template_part('slider');
?>
<div class="container mt-4">
   <div class="row">

      <div class="col-3 content border">
         <b>
            <i class="fa fa-truck"></i> GIAO HÀNG TOÀN QUỐC</b>
      </div>
      <div class="col-3 content border">
         <b>
            <i class="fa fa-credit-card"></i> THANH TOÁN ĐẢM BẢO</b>
      </div>
      <div class="col-3 content border">
         <b>
            <i class="fa fa-refresh"></i> DỊCH VỤ CHỮA GIÀY</b>
      </div>
      <div class="col-3 content border">
         <b>
            <i class="fa fa-life-ring"></i> THIẾT KẾ ĐỒNG PHỤC</b>
      </div>
   </div>
</div>
<div class="container mt-4">
   <div class="row">
      <?php
      foreach ($list_product as $product) {
         $product['url'] = "?mod=product&action=detail_product&id={$product['id_product']}";
      ?>
         <div class="col-3 mt-3">
      
            <a href="<?php echo base_url($product['url']) ?>" class="product_thumb">
               <img src="<?php echo base_url() ?>admin/public/img/<?php echo $product['img_product'] . '.jpg' ?>" alt="" class="img-thumbnail">
            </a>
            <a href="" class="d-block text-center"><?php echo $product['name_product'] ?></a>
            <a href="" class="d-block text-center text-danger"><?php echo currency_format($product['price']) ?></a>
         </div>
      <?php
      }
      ?>
    
   </div>
</div>

<!------------------------------------------------------------------------------------->
<div class="container mt-4 ">
   <div class="row ">
      <div class="col-12" style="text-align: center;"><u><b>KHO ẢNH & VIDEO</b></u></div>
      <div class="col-6 mt-4">
         <img src="https://theme.hstatic.net/1000333077/1000434853/14/hg_img_thumb1.png?v=139" width="140px" height="140px">
         <img src="public/Img/11.webp" width="140px" height="140px" style="margin-left:20px">
         <img src="public/Img/10.webp" width="140px" height="140px" style="margin-left:20px">
         <img src="public/Img/14.webp" width="140px" height="140px" style="margin-top:20px">
         <img src="public/Img/12.webp" width="140px" height="140px" style="margin-left:20px;margin-top:20px">
         <img src="public/Img/13.webp  " width="140px" height="140px" style="margin-left:20px;margin-top:20px">
      </div>

      <div class="col-6">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/ybOi639tb7U" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
   </div>
</div>
<?php
get_footer();
?>