<?php if(count($this->order->getItems()) > 0) { ?>
 <div class="table-responsive compare-table">
    <table class="table table-bordered" style="width:100%;">
        <thead>
        <tr>
            <td class="text-center">
                <?=$this->translate("Product Details")?>
            </td>
            <td></td>
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
        <?php foreach($this->order->getItems() as $item) {
            if ($item instanceof \CoreShop\Model\Order\Item) { ?>
                <?php
                $href = "#";

                if($item->getProduct() instanceof \CoreShop\Model\Product) {
                    $href = $item->getProduct()->getProductUrl($this->language);
                }

                ?>
                <tr class="shopping-cart-item shopping-cart-item-<?= $item->getId() ?>">
                    <td class="text-center">
                        <a href="<?= $href ?>"><?= $item->getProductName() ?></a> <?php if ($item->getIsGiftItem()) { ?>
                            <br/><span><?= $this->translate("Gift Item") ?></span> <?php } ?>


                    </td>
                    <td>
                        <?php if ($item->getIsVirtualProduct() && $this->order->getIsPayed()) { ?>
                            <a class="btn btn-success"
                               href="<?= CoreShop::getTools()->url(["lang" => $this->language, "id" => $item->getId(), "act" => "download-virtual-product"], "coreshop_user"); ?>"><?= $this->translate("Download") ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if ($item->getIsGiftItem()) { ?>
                            <span><?= $item->getAmount() ?></span>
                        <?php } else { ?>
                            <div class="input-group btn-block">
                                <?= $item->getAmount() ?>
                            </div>
                        <?php } ?>
                    </td>
                    <td class="text-right cart-item-price">
                        <?= \CoreShop::getTools()->formatPrice($item->getPrice()) ?>
                    </td>
                    <td class="text-right cart-item-total-price">
                        <?= \CoreShop::getTools()->formatPrice($item->getTotal()) ?>
                    </td>
                </tr>
            <?php }
        } ?>


        <?php if($this->order->getPriceRuleFieldCollection() instanceof \Pimcore\Model\Object\Fieldcollection) {
            foreach($this->order->getPriceRuleFieldCollection()->getItems() as $item) {
                if($item instanceof \CoreShop\Model\PriceRule\Item && $item->getPriceRule() instanceof \CoreShop\Model\Cart\PriceRule && $item->getDiscount() > 0) { ?>
                    <tr>
                        <td colspan="3" class="text-center">
                            <?=$item->getPriceRule()->getName()?>
                        </td>
                        <td class="text-center">

                        </td>
                        <td class="text-right">
                            -<?=\CoreShop::getTools()->formatPrice($item->getDiscount())?>
                        </td>
                        <td class="text-right">
                            -<?=\CoreShop::getTools()->formatPrice($item->getDiscount())?>
                        </td>
                    </tr>
                <?php
                }
            }
        } ?>


        </tbody>
        <tfoot>
        <?php
        $shipping = $this->order->getShipping(false);
        $discount = $this->order->getDiscount();
        $payment = $this->order->getPaymentFee();

        $taxes = $this->order->getTaxes();

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
                <td colspan="3">&nbsp;</td>
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
                <td colspan="3">&nbsp;</td>
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
                <td colspan="3">&nbsp;</td>
                <td class="text-right">
                    <strong><?=$this->translate("Payment Fee")?>:</strong>
                </td>
                <td class="text-right cart-payment">
                    <?=\CoreShop::getTools()->formatPrice($payment)?>
                </td>
            </tr>
        <?php } ?>
        <?php if($taxes instanceof \Pimcore\Model\Object\Fieldcollection) {
                foreach ($taxes->getItems() as $tax) {
                    if ($tax instanceof \CoreShop\Model\Order\Tax) { ?>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                            <td class="text-right cart-tax-detail">
                                <strong><?= $this->translate(sprintf("Tax (%s)", $tax->getName())) ?>:</strong>
                            </td>
                            <td class="text-right cart-tax-detail">
                                <?= \CoreShop::getTools()->formatPrice($tax->getAmount()) ?>
                            </td>
                    </tr>
                <?php
                }
            }
        } ?>
        <tr>
            <td colspan="3">&nbsp;</td>
            <td class="text-right">
                <strong><?=$this->translate("Total Tax")?>:</strong>
            </td>
            <td class="text-right cart-tax">
                <?=\CoreShop::getTools()->formatPrice($this->order->getTotalTax())?>
            </td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
            <td class="text-right">
                <strong><?=$this->translate("Total")?>:</strong>
            </td>
            <td class="text-right cart-total-price">
                <?=\CoreShop::getTools()->formatPrice($this->order->getTotal())?>
            </td>
        </tr>
        </tfoot>
    </table>
 </div>
<?php } else { ?>
    <p><?=$this->translate("Your Shopping Cart is empty")?></p>
<?php } ?>