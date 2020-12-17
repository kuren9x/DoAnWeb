<?php
get_header();
?>
<?php
?>
<div class="container mt-4">
   <h3><?php echo $cat['name_cat'] ?></h3>

   <div class="row">

      <?php
      if (!empty($list_cat_product)) {
         foreach ($list_cat_product as $cat_product) {
            $cat_product['url'] = "?mod=product&action=detail_product&id={$cat_product['id_product']}";
      ?>
            <div class="col-3 mt-3">
               <a href="<?php echo base_url($cat_product['url']) ?>" class="product_thumb">
                  <img src="admin/public/img/<?php echo $cat_product['img_product'] . '.jpg' ?>" alt="" class="img-thumbnail">
               </a>
               <a href="" class="d-block text-center"><?php echo $cat_product['name_product'] ?></a>
               <a href="" class="d-block text-danger text-center"><?php echo currency_format($cat_product['price']) ?></a>
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