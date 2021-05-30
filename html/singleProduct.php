<?php 
$currentid = $i;
$src = '../images/catalogPage/garden.jpg';
if($product -> getFileName() != "")
$src = "../images/products/".$product -> getFileName();
$_SESSION['product'] = $products[$i];
?>



<div class="product">
                      <div class="product-content">
                          <div class="product-img">
                              <img src="<?php echo $src?>" alt="product image">
                          </div>
                          <div class="product-btns">
                              <button type="button"  class="btn-wish">
                                   <a href="product.php">Open</a>
                                  <span><i class = "fas fa-plus"></i></span>
                              </button>
                          </div>
                      </div>
                      <div class="product-info">
                          <div class="product-info-top">
                              <h2 class="sm-title" id="name"><?php echo $product->getName();?></h2>
                          </div>
                          <p class="product-price" id="price"><?php echo $product->getPrice();?></p>
                          
                  </div>
</div>


       
    