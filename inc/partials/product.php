<?php 
    $stock = (int)($product->StockActual ?? 0);
    $priceFormatted = Store::checkUserCapabilities($product);
?>

<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
    <div class="product__item">
        <div class="product__item__pic set-bg" data-setbg="<?php echo Productos::getImage($product->CodProducto); ?>" style="background-image: url('<?php echo Productos::getImage($product->CodProducto); ?>');">
            <a href="detalle.php?id=<?php echo $product->CodProducto; ?>" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;"></a>
            <!-- <div class="product__discount__percent">-20%</div> -->
            <div class="product__code">
                <h5><?php echo 'COD: ' . $product->CodProducto; ?></h5>
            </div>
            <?php if ($general->showLoginPrices() && $stock > 0): ?>
                <form class="js-form-cart">
                    <input type="hidden" name="id_product" value="<?php echo $product->Id_Producto; ?>">
                    <input type="hidden" name="cod_product" value="<?php echo $product->CodProducto; ?>">
                    <input type="hidden" name="name_product" value="<?php echo $product->Nombre; ?>">
                    <input type="hidden" name="price_product" value="<?php echo $priceFormatted; ?>">
                    <input type="hidden" name="nota" value="">
                    <input type="hidden" name="cant" value="1">
                    <ul class="product__item__pic__hover">
                        <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="#"><i class="fa fa-retweet"></i></a></li> -->
                        <li><a href="javascript:;" onclick="$(this).closest('form').submit();" title="Agregar al carrito"><i
                                    class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </form>
            <?php endif; ?>
        </div>
        <div class="product__item__text">
            <span><?php echo $product->Rubro; ?></span>
            <h6><a href="detalle.php?id=<?php echo $product->CodProducto; ?>"><?php echo $product->Nombre; ?></a></h6>

            <?php if ($general->showPrices()): ?>
                <p class="text-danger">
                    <?php echo 'Precio Lista: <strong>$ ' . $priceFormatted . '</strong>'; ?>
                </p>
            <?php endif; ?>

            <?php if ($general->showLoginPrices()): ?>
                <form class="js-form-cart">
                    <input type="hidden" name="id_product" value="<?php echo $product->Id_Producto; ?>">
                    <input type="hidden" name="cod_product" value="<?php echo $product->CodProducto; ?>">
                    <input type="hidden" name="name_product" value="<?php echo $product->Nombre; ?>">
                    <input type="hidden" name="price_product" value="<?php echo $priceFormatted; ?>">
                    <div class="d-flex">
                        <textarea type="text" name="nota" class="product__details__note"
                            placeholder="Agregar Nota"><?php echo ($stock > 0) ? '' : 'Sin Stock'; ?></textarea>
                    </div>

                    <div class="product__details__quantity mb-2">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="number" name="cant" min="1" max="<?php echo $stock; ?>"
                                    value="<?php echo ($stock > 0) ? 1 : 0; ?>">
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="primary-btn add-to-cart mb-2" value="+ CARRITO" <?php echo ($stock > 0) ? '' : 'disabled'; ?>>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>