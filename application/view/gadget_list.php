<?php include(VIEW_PATH . 'top.php'); ?>

<div class="container">
  <div class="women_main">
    <!-- start sidebar -->
   
    
    
    <!-- start content -->
    <div class="col-md-12 w_content">
      <div class="women">
       
        <ul class="w_nav">
          

          <div class="clear"></div>	
        </ul>
        <div class="clearfix"></div>	
      </div>

      <!-- grids_of_4 -->
<?php

      if(count($rows) > 0) {
        $cnt = 0;
        foreach($rows as $row) {
          $cnt++;
          $product_id = $row["product_id"];
          $product_name = $row['product_name'];
          $brand = $row["brand"];
          $color = $row["color"];
          $weight = $row["weight"];
          $price = $row["price"];
          $sale_price = $row["sale_price"];
          $stock = $row["stock"];
          $image = $row["image1"];
          $sold_count = $row["sold_count"];
          $onSale = $row["sale_yn"] == 'Y' ? true : false;
          $onSaleTag = "";
          $desc = $row["short_description"];
          $onSalePrice = "";
          if($onSale) {
            $prduct_name = "<h3>" . $row['product_name'] . " <span style='color:red; font-size:15pt;'>ON SALE</span></h3>";
            $onSalePrice = " / sale price : $sale_price";
          }
          
          $sold_count_div = "";
          if($pid === "gadget_top50list") {
            $sold_count_div = "<div class='item_add'><span class='item_price'><h6>sold $sold_count items</h6></span></div>";
          }

          if($cnt == 1) {  
?>
      <div class="grids_of_4">
<?php     }  ?>
        <div class="grid1_of_4">
          <div class="content_box">
            <div style="height:180px;overflow:hidden;">
              <a href="index.php?pid=gadget_detail&product_id=<?php echo $product_id; ?>"><img src="../public_html/images/products/<?php echo $image; ?>" style="border-radius:10px;" class="img-responsive" alt=""/></a>  
            </div>
            <h4><a href="index.php?pid=gadget_detail&product_id=<?php echo $product_id; ?>"><?php echo $product_name; ?></a></h4>
            <p><?php echo $desc; ?></p>
            <div class="grid_1 simpleCart_shelfItem">
              <div class="item_add"><span class="item_price"><h6><?php echo $onSale ? "<del>$price</del> <span class='text-danger'><big>$sale_price</big></span>":"$price"; ?></h6></span></div>
              <?php echo $sold_count_div; ?>
              
            </div>
          </div>
        </div>
<?php 
          if($cnt == 4) {
            $cnt = 0;
?>
        <div class="clearfix"></div>
      </div>
<?php     
          }
        }
        
        if($cnt > 0) {
?>
        <div class="clearfix"></div>
      </div>
<?php
        }
      }
?>
      <!-- grids_of_4 -->
  
    </div>  <!-- end content -->
    <div class="clearfix"></div>

  </div>
</div>



  <script type="text/javascript">
    /* global $ */
    $(document).ready(function() {
      $('#category').change(function() {
        $('#frm_categorySort').submit();
      });
      $('#orderby').change(function() {
        $('#frm_categorySort').submit();
      });
      
      // category function
      $("input[name='category']").change(function() {
        var categories = $("input[name='category']:checked").map(function() {
          return $(this).val();
        }).get();
        
        // alert("categories("+ categories +")");
        
        $('#frm_cond input[name=category]').val(categories);

        $('#frm_cond').submit();
      });

      // sort function
      $(".sort").click(function() {
        event.preventDefault();
        $('#frm_cond input[name=orderby]').val($(this).data("value"));
        $('#frm_cond').submit();
      });



    });
  </script>


<?php include(VIEW_PATH . 'bottom.php'); ?>



