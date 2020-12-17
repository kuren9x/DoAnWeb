<?php
get_header();
?>

<div class="container mt-4">
   <h3><?php echo $trademark['name_trademark']  ?></h3>

   <div class="row">

      <?php
      if (!empty($list_trademark_product)) {
         foreach ($list_trademark_product as $trademark_product) {
            $trademark_product['url'] = "?mod=product&action=detail_product&id={$trademark_product['id_product']}";
      ?>
            <div class="col-3 mt-3">
               <a href="<?php echo base_url($trademark_product['url']) ?>" class="product_thumb">
                  <img src="admin/public/img/<?php echo $trademark_product['img_product'] . '.jpg' ?>" alt="" class="img-thumbnail">
               </a>
               <a href="" class="d-block text-center"><?php echo $trademark_product['name_product'] ?></a>
               <a href="" class="d-block text-danger text-center"><?php echo currency_format($trademark_product['price']) ?></a>
            </div>
      <?php
         }
      }
      ?>

   </div>
</div>
<?php
get_footer();
?>