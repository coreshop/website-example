<?php if($this->product->getDiscount() > 0) {
        $price = $this->product->getPrice(\CoreShop::getTools()->displayPricesWithTax());
        $salesPrice = $this->product->getSalesPrice(\CoreShop::getTools()->displayPricesWithTax());
    ?>
    <span class="price-old"><?=\CoreShop::getTools()->formatPrice($salesPrice)?></span>
    <span class="price-savings">(<?=\CoreShop::getTools()->numberFormat(-1 * (100/$salesPrice) * ($salesPrice - $price), 0)?>%, <?=\CoreShop::getTools()->formatPrice($price - $salesPrice)?>)</span>
<?php } ?>