<?php
get_header();
?>

<div class="container mt-4">
   <h3>Sản phẩm tìm thấy</h3>

   <div class="row">
      <?php
      if (!empty($list_search)) {
         foreach ($list_search as $search) {
            $search['url'] = "?mod=product&action=detail_product&id={$search['id_product']}";
      ?>
            <div class="col-3 mt-3">
               <a href="<?php echo base_url($search['url']) ?>" class="product_thumb">
                  <img src="admin/public/img/<?php echo $search['img_product'] . '.jpg' ?>" alt="" class="img-thumbnail">
               </a>
               <a href="" class="d-block text-center"><?php echo $search['name_product'] ?></a>
               <a href="" class="d-block text-danger text-center"><?php echo currency_format($search['price']) ?></a>
            </div>
         <?php
         }
      } else {
         ?>
         <p>Không tìm thấy sản phẩm</p>
      <?php
      }
      ?>

   </div>
</div>

<?php
get_footer();
?>