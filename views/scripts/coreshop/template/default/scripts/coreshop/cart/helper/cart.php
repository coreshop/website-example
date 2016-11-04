<?php if(count($this->cart->getItems()) > 0) { ?>
<div class="table-responsive shopping-cart-table">
    <table class="table table-bordered">
        <thead>
        <tr>
            <td class="text-center">
                <?=$this->translate("Image")?>
            </td>
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
            <?php if($this->edit) { ?>
                <td class="text-center">
                    <?=$this->translate("act")?>
                </td>
            <?php } ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach($this->cart->getItems() as $item) { ?>

            <?php
            $href = \CoreShop::getTools()->url(array("lang" => $this->language, "product" => $item->getProduct()->getId(), "name" => $item->getProduct()->getName()), "coreshop_detail");
            ?>
            <tr class="shopping-cart-item shopping-cart-item-<?=$item->getId()?>">
                <td class="text-center">
                    <?php if($item->getProduct()->getImage() instanceof Pimcore\Model\Asset\Image) { ?>
                        <a class="" href="<?=$href?>">
                            <?php
                                echo $item->getProduct()->getImage()->getThumbnail("coreshop_productCart")->getHtml(array("class" => "img-responsive", "alt" => $item->getProduct()->getName(), "title" => $item->getProduct()->getName()));
                            ?>
                        </a>
                    <?php } ?>
                </td>
                <td class="text-center">
                    <a href="<?=$href?>"><?=$item->getProduct()->getName()?></a> <?php if($item->getIsGiftItem()) { ?> <br/><span><?=$this->translate("Gift Item")?></span> <?php } ?>

                    <?php if(count($item->product->getValidSpecificPriceRules()) > 0) { ?>
                        <div class="price-rules">
                        <?php foreach($item->product->getValidSpecificPriceRules() as $rule) { ?>
                            <?php foreach($rule->getActions() as $action) { ?>
                                <?php
                                    if($action instanceof \CoreShop\Model\PriceRule\Action\DiscountAmount) {
                                        echo "<br/>" . $this->translate(sprintf("You will get a discount of %s per Product.", \CoreShop::getTools()->formatPrice($action->getAmount())));
                                    }
                                    else if($action instanceof \CoreShop\Model\PriceRule\Action\DiscountPercent) {
                                        echo "<br/>" . $this->translate(sprintf("You will get a discount of %s%% per Product.", $action->getPercent()));
                                    }
                                    else if($action instanceof \CoreShop\Model\PriceRule\Action\NewPrice) {
                                        echo "<br/>" . $this->translate(sprintf("You will get a total new price of %s instead of %s.", \CoreShop::getTools()->formatPrice($action->getPriceWithTax($item->getProduct())), \CoreShop::getTools()->formatPrice($item->getProductRetailPriceWithTax())));
                                    }
                                ?>
                            <?php } ?>
                        <?php } ?>
                        </div>
                    <?php } ?>
                </td>
                <td class="text-center">
                    <?php if($item->getIsGiftItem() || !$this->edit) { ?>
                        <span><?=$item->getAmount()?></span>
                    <?php } else { ?>
                        <div class="input-group btn-block">
                            <input type="number" name="cart-item-amount-<?=$item->getId()?>" value="<?=$item->getAmount()?>" size="1" class="form-control cart-item-amount" data-id="<?=$item->getId()?>" <?=!$this->edit ? "readonly" :  ""?> />
                        </div>
                    <?php } ?>
                </td>
                <td class="text-right cart-item-price">
                    <?php
                        $price = $item->getProductPrice(\CoreShop::getTools()->displayPricesWithTax());
                        $retailPrice = $item->getProductSalesPrice(\CoreShop::getTools()->displayPricesWithTax());

                        if($retailPrice != $price) {
                            ?><span class="price-old"><?=\CoreShop::getTools()->formatPrice($retailPrice)?></span><?php
                        }

                        echo \CoreShop::getTools()->formatPrice($price)
                    ?>
                </td>
                <td class="text-right cart-item-total-price">
                    <?=\CoreShop::getTools()->formatPrice($item->getTotal(\CoreShop::getTools()->displayPricesWithTax()))?>
                </td>
                <?php if($this->edit) { ?>
                    <td class="text-center">
                        <?php if($item->getIsGiftItem()) { ?>

                        <?php } else { ?>
                            <button type="button" title="<?=$this->translate("Remove")?>" class="btn btn-default tool-tip removeFromCart" data-id="<?=$item->getId()?>">
                                <i class="fa fa-times-circle"></i>
                            </button>
                        <?php } ?>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
        <?php foreach($this->cart->getPriceRules() as $rule) {
            if($rule->getPriceRule() instanceof \CoreShop\Model\Cart\PriceRule && $rule->getPriceRule()->getDiscount() > 0) {
                ?>
                <tr>
                    <td colspan="2" class="text-center">
                        <?=$rule->getPriceRule()->getLabel() ? $rule->getPriceRule()->getLabel() : $rule->getPriceRule()->getName()?> <?=$rule->getVoucherCode() ? '(' . $rule->getVoucherCode() . ')' : '' ?>
                    </td>
                    <td class="text-center">

                    </td>
                    <td class="text-right">
                        -<?=\CoreShop::getTools()->formatPrice($rule->getPriceRule()->getDiscount())?>
                    </td>
                    <td class="text-right">
                        -<?=\CoreShop::getTools()->formatPrice($rule->getPriceRule()->getDiscount())?>
                    </td>
                    <?php if($this->edit) { ?>
                        <td colspan="1" class="text-left cart-sub-total">
                            <a title="<?=$this->translate("Remove")?>" class="btn btn-default tool-tip removeFromCart" href="<?=\CoreShop::getTools()->url(array("act" => "removepricerule", "id" => $rule->getPriceRule()->getId()), "coreshop_cart")?>">
                                <i class="fa fa-times-circle"></i>
                            </a>
                        </td>
                    <?php } ?>
                </tr>
                <?php
            }
        } ?>
        </tbody>
        <tfoot>
        <?php
        $shipping = $this->cart->getShipping(false);
        $shippingIt = $this->cart->getShipping(true);
        $discount = $this->cart->getDiscount();
        $discountEt = $this->cart->getDiscount(false);
        $payment = $this->cart->getPaymentFee();

        $taxes = $this->cart->getTaxes();

        $rowspan = 10 + count($taxes);

        if($shipping == 0)
            $rowspan--;

        if($discount == 0)
            $rowspan-=2;

        if($payment == 0)
            $rowspan-=2;
        ?>
        <tr>
            <td colspan="3" rowspan="<?=$rowspan?>">
                <form class="form-inline" role="form" method="post" action="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "pricerule"), "coreshop_cart", true)?>">
                    <?php if(!$this->edit) { ?>
                        <input type="hidden" name="redirect" value="<?=\CoreShop::getTools()->url(array("act" => "payment"), "coreshop_checkout")?>" />
                    <?php } ?>
                    <div class="form-group">
                        <h4><?=$this->translate("Voucher")?></h4>
                    </div><br/>
                    <div class="form-group">
                        <input type="text" class="pruceRule form-control" id="priceRule" name="priceRule" value="">
                    </div>
                    <button type="submit" name="submitAddDiscount" class="btn btn-black"><span>OK</span></button>
                </form>
                <?php
                $highlightPriceRules = \CoreShop\Model\Cart\PriceRule::getHighlightItems();

                if(count($highlightPriceRules) > 0)
                {
                ?>
                <h4><?= $this->translate("Take advantage of our exclusive offers:") ?></h4>
                <ul class="list">
                    <?php
                    }

                    foreach($highlightPriceRules as $priceRule) {
                        echo '<li class="cart-rule"><strong class="cart-rule-code">'.$priceRule->getCode().'</strong> ' . $priceRule->getName() . '</li>';
                    }

                    if(count($highlightPriceRules) > 0)
                    ?></ul><?
                ?>
            </td>
            <td class="text-right">
                <strong><?=$this->translate("Subtotal (tax incl.)")?>:</strong>
            </td>
            <td colspan="<?=$this->edit ? "2" : "1" ?>" class="text-right cart-sub-total">
                <?=\CoreShop::getTools()->formatPrice($this->cart->getSubtotal(true))?>
            </td>
        </tr>
        <tr>
            <td class="text-right">
                <strong><?=$this->translate("Subtotal (tax excl.)")?>:</strong>
            </td>
            <td colspan="<?=$this->edit ? "2" : "1" ?>" class="text-right cart-discount">
                <?=\CoreShop::getTools()->formatPrice($this->cart->getSubtotal(false))?>
            </td>
        </tr>
        <?php if($discount > 0) { ?>
            <tr>
                <td class="text-right">
                    <strong><?=$this->translate("Discount (tax incl.)")?>:</strong>
                </td>
                <td colspan="<?=$this->edit ? "2" : "1" ?>" class="text-right cart-discount">
                    -<?=\CoreShop::getTools()->formatPrice($discount)?>
                </td>
            </tr>
            <tr>
                <td class="text-right">
                    <strong><?=$this->translate("Discount (tax excl.)")?>:</strong>
                </td>
                <td colspan="<?=$this->edit ? "2" : "1" ?>" class="text-right cart-discount">
                    -<?=\CoreShop::getTools()->formatPrice($discountEt)?>
                </td>
            </tr>
        <?php } ?>
        <?php if($shipping > 0) { ?>
            <tr>
                <td class="text-right">
                    <strong><?=$this->translate("Shipping (tax incl.)")?>:</strong>
                </td>
                <td colspan="<?=$this->edit ? "2" : "1" ?>" class="text-right cart-shipping">
                    <?=\CoreShop::getTools()->formatPrice($shippingIt)?>
                </td>
            </tr>
            <tr>
                <td class="text-right">
                    <strong><?=$this->translate("Shipping (tax excl.)")?>:</strong>
                </td>
                <td colspan="<?=$this->edit ? "2" : "1" ?>" class="text-right cart-shipping">
                    <?=\CoreShop::getTools()->formatPrice($shipping)?>
                </td>
            </tr>
        <?php } ?>
        <?php if($payment > 0) { ?>
            <tr>
                <td class="text-right">
                    <strong><?=$this->translate("Payment Fee")?>:</strong>
                </td>
                <td colspan="<?=$this->edit ? "2" : "1" ?>" class="text-right cart-payment">
                    <?=\CoreShop::getTools()->formatPrice($payment)?>
                </td>
            </tr>
        <?php } ?>
        <?php foreach($taxes as $tax) { ?>
            <tr>
                <td class="text-right cart-tax-detail">
                    <strong><?=$this->translate(sprintf("Tax (%s)", $tax['tax']->getName()))?>:</strong>
                </td>
                <td colspan="<?=$this->edit ? "2" : "1" ?>" class="text-right cart-tax-detail">
                    <?=\CoreShop::getTools()->formatPrice($tax['amount'])?>
                </td>
            </tr>
        <?php } ?>
       <tr>
            <td class="text-right">
                <strong><?=$this->translate("Total Tax")?>:</strong>
            </td>
            <td colspan="<?=$this->edit ? "2" : "1" ?>" class="text-right cart-tax">
                <?=\CoreShop::getTools()->formatPrice($this->cart->getTotalTax())?>
            </td>
        </tr>
        <tr>
            <td class="text-right">
                <strong><?=$this->translate("Total ")?>:</strong>
            </td>
            <td colspan="<?=$this->edit ? "2" : "1" ?>" class="text-right cart-total-price">
                <?=\CoreShop::getTools()->formatPrice($this->cart->getTotal())?>
            </td>
        </tr>
        </tfoot>
    </table>
</div>
<?php } else { ?>
    <p><?=$this->translate("Your Shopping Cart is empty")?></p>
<?php } ?>
