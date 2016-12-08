<div class="row">
    <div class="col-xs-12">
        <div class="invoice-table">

            <table class="table items">
                <thead>
                <tr>
                    <th class="col-xs-1"><?=$this->translate("Quantity")?></th>
                    <th class="col-xs-7"><?=$this->translate("Description")?></th>
                    <th class="col-xs-1 text-right">
                        <?=$this->translate("Price")?><br/>
                        <span><?=$this->translate("exc. Tax")?></span>
                    </th>
                    <th class="col-xs-1 text-right">
                        <?=$this->translate("Price")?><br/>
                        <span><?=$this->translate("inc. Tax")?></span>
                    </th>
                    <th class="col-xs-1 text-right">
                        <?=$this->translate("Total")?><br/>
                        <span><?=$this->translate("exc. Tax")?></span>
                    </th>
                    <th class="col-xs-1 text-right">
                        <?=$this->translate("Total")?><br/>
                        <span><?=$this->translate("inc. Tax")?></span>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0; foreach($this->invoice->getItems() as $item) { ?>
                    <tr style="<?=$i+1 === count($this->invoice->getItems()) ? "height:100%": ""?>">
                        <td class="text-right">
                            <?=$item->getAmount()?>
                        </td>
                        <td class="text-center">
                            <?=$item->getProduct()->getName()?> <?php if($item->getIsGiftItem()) { ?> <br/><span><?=$this->translate("Gift Item")?></span> <?php } ?>

                            <?
                            if(is_array($item->getProduct()->getVariants())) {
                                foreach ($item->getProduct()->getVariants() as $variant) {
                                    if ($variant instanceof \CoreShop\Model\Objectbrick\Data\Objectbrick) {
                                        echo $variant->renderInvoice();
                                    }
                                }
                            }?>
                        </td>
                        <td class="text-right">
                            <?=\CoreShop::getTools()->formatPrice($item->getPriceWithoutTax())?>
                        </td>
                        <td class="text-right">
                            <?=\CoreShop::getTools()->formatPrice($item->getAmount() * $item->getPriceWithoutTax())?>
                        </td>
                        <td class="text-right">
                            <?=\CoreShop::getTools()->formatPrice($item->getPrice())?>
                        </td>
                        <td class="text-right">
                            <?=\CoreShop::getTools()->formatPrice($item->getAmount() * $item->getPrice())?>
                        </td>
                    </tr>
                    <?php $i++;} ?>
                </tbody>
            </table>
            <?php
            $shipping = $this->invoice->getShippingWithoutTax();
            $discount = $this->invoice->getDiscount();
            $payment = $this->invoice->getPaymentFee();

            $rowspan = 7;

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
                        <strong><?=$this->translate("Subtotal (exc. Tax)")?></strong>
                    </td>
                    <td class="col-xs-2 no-border-top text-right">
                        <?=\CoreShop::getTools()->formatPrice($this->invoice->getSubtotalWithoutTax())?>
                    </td>
                </tr>
                <tr>
                    <td class="col-xs-2 no-border">
                        <strong><?=$this->translate("Subtotal (inc. Tax)")?></strong>
                    </td>
                    <td class="col-xs-2 text-right">
                        <?=\CoreShop::getTools()->formatPrice($this->invoice->getSubtotal())?>
                    </td>
                </tr>
                <?php if($shipping > 0) { ?>
                    <tr>
                        <td class="col-xs-2 no-border">
                            <strong><?=$this->translate("Shipping")?></strong>
                        </td>
                        <td class="col-xs-2 text-right">
                            <?=\CoreShop::getTools()->formatPrice($shipping)?>
                        </td>
                    </tr>
                <?php } ?>
                <?php if($payment > 0) { ?>
                    <tr>
                        <td class="col-xs-2 no-border">
                            <strong><?=$this->translate("Payment")?></strong>
                        </td>
                        <td class="col-xs-2 text-right">
                            <?=\CoreShop::getTools()->formatPrice($payment)?>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td class="col-xs-2 no-border">
                        <strong><?=$this->translate("Total Tax")?>:</strong>
                    </td>
                    <td class="col-xs-2 text-right">
                        <?=\CoreShop::getTools()->formatPrice($this->invoice->getTotalTax())?>
                    </td>
                </tr>
                <?php if($discount > 0) { ?>
                    <tr>
                        <td class="col-xs-2 no-border">
                            <strong><?=$this->translate("Discount")?></strong>
                        </td>
                        <td class="col-xs-2 text-right">
                            <?=\CoreShop::getTools()->formatPrice(-1 * $discount)?>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td class="col-xs-2 no-border">
                        <strong><?=$this->translate("Total")?></strong>
                    </td>
                    <td class="col-xs-2 text-right background-gray">
                        <strong><?=\CoreShop::getTools()->formatPrice($this->invoice->getTotal())?></strong>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>