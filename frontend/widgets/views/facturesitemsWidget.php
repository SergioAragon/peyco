<div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Productos</h2>

<?php foreach ($data as $key => $value)
{
?>
    


                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="">
                                            <img src="<?= '/PEYCO1/backend/web/img/'.$value['imag_adju']?>" alt="<?=$value["nombre"] ?>" />
                                            </a>
                                            <h2>$<?php echo number_format($value["costo"],0,",","." )?></h2>
                                            <p><a href="#"><?=$value["nombre"]?></a></p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                     
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <?php } ?>
                    </div><!--features_items-->
                    
