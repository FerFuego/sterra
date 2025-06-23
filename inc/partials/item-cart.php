<?php $prod = new Productos($item->CodProducto); ?>
<?php print_r($item); ?>
<tr>
    <td class="shoping__cart__item">
        <div class="d-flex">
                <img src="<?php echo Productos::getImage( $item->CodProducto ); ?>" width="60px">
                <div class="d-flex flex-column">
                    <b><?php echo $item->CodProducto; ?></b>
                    <h5><?php echo $item->Nombre; ?></h5>
                </div>
            </div>
        </td>
        <td class="shoping__cart__note">
            <textarea type="text" name="nota" id="nota_<?php echo $item->Auto; ?>"><?php echo $item->Notas; ?></textarea>
        </td>
        <td class="shoping__cart__price">
            $<?php echo number_format($item->PreVtaFinal1, 2,',','.'); ?>
        </td>
        <td class="shoping__cart__quantity">
            <div class="quantity">
                <div class="pro-qty">
                    <input type="number" name="cant" max="1000<?php echo $prod->getStock(); ?>" id="cant_<?php echo $item->Auto; ?>" value="<?php echo $item->Cantidad; ?>">
                </div>
            </div>
        </td>
        <td class="shoping__cart__total">
            $<?php echo number_format($item->ImpTotal, 2,',','.'); ?>
        </td>
        <td class="shoping__cart__item__update">
            <form class="js-form-update">
                <input type="hidden" name="id_item" value="<?php echo $item->Auto; ?>">
                <input type="hidden" name="codprod" value="<?php echo $item->CodProducto; ?>">
                <span onclick="$(this).closest('form').submit();" class="icon_refresh" title="Actualizar"></span>
            </form>
        </td>
    <td class="shoping__cart__item__close">
        <form class="js-form-delete">
            <input type="hidden" name="id_item" value="<?php echo $item->Auto; ?>">
            <span onclick="$(this).closest('form').submit();" class="icon_close" title="Eliminar"></span>
        </form>
    </td>
</tr>