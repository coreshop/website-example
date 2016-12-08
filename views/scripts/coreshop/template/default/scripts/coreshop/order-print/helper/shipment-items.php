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
                <?php $i=0; foreach($this->shipment->getItems() as $item) { ?>
                    <tr style="<?=$i+1 === count($this->shipment->getItems()) ? "height:100%": ""?>">
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

        </div>
    </div>
</div>