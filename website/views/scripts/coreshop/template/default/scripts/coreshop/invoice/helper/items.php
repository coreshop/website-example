<div class="row">
    <div class="col-xs-12">
        <div class="invoice-table">

            <table class="table items">
                <thead>
                <tr>
                    <th class="col-xs-1"><?=$this->translate("Quantity")?></th>
                    <th class="col-xs-7"><?=$this->translate("Description")?></th>
                    <th class="col-xs-2 text-right">
                        <?=$this->translate("Price")?><br/>
                        <span><?=$this->translate("excl. Tax")?></span>
                    </th>
                    <th class="col-xs-2 text-right">
                        <?=$this->translate("Total")?><br/>
                        <span><?=$this->translate("excl. Tax")?></span>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0; foreach($this->order->getItems() as $item) { ?>
                    <tr style="<?=$i+1 === count($this->order->getItems()) ? "height:100%": ""?>">
                        <td class="text-right">
                            <?=$item->getAmount()?>
                        </td>
                        <td class="text-center">
                            <?=$item->getProduct()->getName()?> <?php if($item->getIsGiftItem()) { ?> <br/><span><?=$this->translate("Gift Item")?></span> <?php } ?>

                            <? foreach($item->getProduct()->getVariants() as $variant) {
                                if($variant instanceof \CoreShop\Model\Objectbrick\Data\Objectbrick) {
                                    echo $variant->renderInvoice();
                                }
                            }?>
                        </td>
                        <td class="text-right">
                            <?=\CoreShop\Tool::formatPrice($item->getRetailPrice())?>
                        </td>
                        <td class="text-right">
                            <?=\CoreShop\Tool::formatPrice($item->getAmount() * $item->getRetailPrice())?>
                        </td>
                    </tr>
                    <?php $i++;} ?>
                </tbody>
            </table>
            <?php
            $shipping = $this->order->getShippingWithoutTax();
            $discount = $this->order->getDiscount();
            $payment = $this->order->getPaymentFee();
            $taxes = $this->order->getTaxRates();

            $rowspan = 7 + count($taxes);

            if($shipping == 0)
                $rowspan--;

            if($discount == 0)
                $rowspan--;

            if($payment == 0)
                $rowspan--;
            ?>
            <table class="table summary">
                <tr>
                    <td class="col-xs-8" rowspan="<?=$rowspan?>">
                        <p>

                        </p>
                    </td>
                    <td class="col-xs-2 no-border">
                        <strong><?=$this->translate("Subtotal")?></strong>
                    </td>
                    <td class="col-xs-2 no-border-top text-right">
                        <?=\CoreShop\Tool::formatPrice($this->order->getSubtotalWithoutTax())?>
                    </td>
                </tr>
                <tr>
                    <td class="col-xs-2 no-border">
                        <strong><?=$this->translate("Shipping")?></strong>
                    </td>
                    <td class="col-xs-2 text-right">
                        <?=\CoreShop\Tool::formatPrice($shipping)?>
                    </td>
                </tr>
                <?php if($payment > 0) { ?>
                    <tr>
                        <td class="col-xs-2 no-border">
                            <strong><?=$this->translate("Payment")?></strong>
                        </td>
                        <td class="col-xs-2 text-right">
                            <?=\CoreShop\Tool::formatPrice($payment)?>
                        </td>
                    </tr>
                <?php } ?>
                <?php foreach($taxes as $name => $tax) { ?>
                    <tr>
                        <td class="col-xs-2 no-border">
                            <strong><?=$this->translate("Tax")?> (<?=$name?>)</strong>
                        </td>
                        <td class="col-xs-2 text-right">
                            <?=\CoreShop\Tool::formatPrice($tax)?>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td class="col-xs-2 no-border">
                        <strong><?=$this->translate("Total Tax")?>:</strong>
                    </td>
                    <td class="col-xs-2 text-right">
                        <?=\CoreShop\Tool::formatPrice($this->order->getTotalTax())?>
                    </td>
                </tr>
                <?php if($discount > 0) { ?>
                    <tr>
                        <td class="col-xs-2 no-border">
                            <strong><?=$this->translate("Discount")?></strong>
                        </td>
                        <td class="col-xs-2 text-right">
                            <?=\CoreShop\Tool::formatPrice($discount)?>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td class="col-xs-2 no-border">
                        <strong><?=$this->translate("Total")?></strong>
                    </td>
                    <td class="col-xs-2 text-right background-gray">
                        <strong><?=\CoreShop\Tool::formatPrice($this->order->getTotal())?></strong>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>