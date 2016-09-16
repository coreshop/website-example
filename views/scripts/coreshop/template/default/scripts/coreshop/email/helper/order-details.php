<?php if(count($this->order->getItems()) > 0) { ?>

    <table class="table table-bordered" style="width:100%;">
        <thead>
        <tr>
            <td class="text-center">
                <?=$this->translate("Product Details")?>
            </td>
            <td class="text-center">
                <?=$this->translate("Quantity")?>
            </td>
            <td class="text-center">
                <?=$this->translate("Price")?>
            </td>
            <td class="text-center">
                <?=$this->translate("Total")?>
            </td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($this->cart->getItems() as $item) { ?>
            <?php
                $href = \CoreShop::getTools()->url(array("lang" => $this->language, "product" => $item->getProduct()->getId(), "name" => $item->getProduct()->getName()), "coreshop_detail");
            ?>
            <tr class="shopping-cart-item shopping-cart-item-<?=$item->getId()?>">
                <td class="text-center">
                    <a href="<?=$href?>"><?=$item->getProduct()->getName()?></a> <?php if($item->getIsGiftItem()) { ?> <br/><span><?=$this->translate("Gift Item")?></span> <?php } ?>
                </td>
                <td class="text-center">
                    <?php if($item->getIsGiftItem()) { ?>
                        <span><?=$item->getAmount()?></span>
                    <?php } else { ?>
                        <div class="input-group btn-block">
                            <?=$item->getAmount()?>
                        </div>
                    <?php } ?>
                </td>
                <td class="text-right cart-item-price">
                    <?=\CoreShop::getTools()->formatPrice($item->getProductPrice())?>
                </td>
                <td class="text-right cart-item-total-price">
                    <?=\CoreShop::getTools()->formatPrice($item->getTotal())?>
                </td>
            </tr>
        <?php } ?>

        <?php if($this->cart->getPriceRule() instanceof \CoreShop\Model\Cart\PriceRule && $this->cart->getPriceRule()->getDiscount() > 0) { ?>
            <tr>
                <td colspan="2" class="text-center">
                    <?=$this->cart->getPriceRule()->getName()?>
                </td>
                <td class="text-center">

                </td>
                <td class="text-right">
                    -<?=\CoreShop::getTools()->formatPrice($this->cart->getPriceRule()->getDiscount())?>
                </td>
                <td class="text-right">
                    -<?=\CoreShop::getTools()->formatPrice($this->cart->getPriceRule()->getDiscount())?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <?php
        $shipping = $this->cart->getShipping(false);
        $discount = $this->cart->getDiscount();
        $payment = $this->cart->getPaymentFee();

        $taxes = $this->cart->getTaxes();

        $rowspan = 6 + count($taxes);

        if($shipping == 0)
            $rowspan--;

        if($discount == 0)
            $rowspan--;

        if($payment == 0)
            $rowspan--;
        ?>
        <?php if($discount > 0) { ?>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td class="text-right">
                    <strong><?=$this->translate("Discount")?>:</strong>
                </td>
                <td class="text-right cart-discount">
                    -<?=\CoreShop::getTools()->formatPrice($discount)?>
                </td>
            </tr>
        <?php } ?>
        <?php if($shipping > 0) { ?>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td class="text-right">
                    <strong><?=$this->translate("Shipping")?>:</strong>
                </td>
                <td class="text-right cart-shipping">
                    <?=\CoreShop::getTools()->formatPrice($shipping)?>
                </td>
            </tr>
        <?php } ?>
        <?php if($payment > 0) { ?>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td class="text-right">
                    <strong><?=$this->translate("Payment Fee")?>:</strong>
                </td>
                <td class="text-right cart-payment">
                    <?=\CoreShop::getTools()->formatPrice($payment)?>
                </td>
            </tr>
        <?php } ?>
        <?php foreach($taxes as $tax) { ?>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td class="text-right cart-tax-detail">
                    <strong><?=$this->translate(sprintf("Tax (%s)", $tax['tax']->getName()))?>:</strong>
                </td>
                <td class="text-right cart-tax-detail">
                    <?=\CoreShop::getTools()->formatPrice($tax['amount'])?>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td class="text-right">
                <strong><?=$this->translate("Total Tax")?>:</strong>
            </td>
            <td class="text-right cart-tax">
                <?=\CoreShop::getTools()->formatPrice($this->cart->getTotalTax())?>
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td class="text-right">
                <strong><?=$this->translate("Total ")?>:</strong>
            </td>
            <td class="text-right cart-total-price">
                <?=\CoreShop::getTools()->formatPrice($this->cart->getTotal())?>
            </td>
        </tr>
        </tfoot>
    </table>
<?php } else { ?>
    <p><?=$this->translate("Your Shopping Cart is empty")?></p>
<?php } ?>