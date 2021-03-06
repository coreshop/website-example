<?php
    $href = $this->product->getProductUrl($this->language);
    $uniqid = uniqid() . "-product-image-" . $this->product->getId();
?>
<div class="product-col">
    <div class="image">
        <?php if($this->product->getImage() instanceof \Pimcore\Model\Asset\Image) { ?>
            <?php if($this->product->getIsNew()) { ?>
                <div class="image-new-badge"></div>
            <?php } ?>

            <a href="<?=$href?>">
                <?php
                    echo $this->product->getImage()->getThumbnail("coreshop_productList")->getHtml(array("class" => "img-responsive", "alt" => $this->product->getName(), "id" => $uniqid));
                ?>
            </a>

            <hr/>
        <?php } ?>
    </div>
    <div class="caption">
        <h4><a href="<?=$href?>"><?=$this->product->getName()?></a></h4>
        <div class="description">
            <?=$this->product->getShortDescription()?>
        </div>
        <?php if($this->product->getAvailableForOrder()) { ?>
            <div class="price">
                <span class="price-new"><?=\CoreShop::getTools()->formatPrice($this->product->getPrice(\CoreShop::getTools()->displayPricesWithTax()))?></span>
                <?=$this->template("product/helper/productSavings.php");?>
            </div>
            <?php if(!\CoreShop\Model\Configuration::isCatalogMode() && ($this->product->isAvailableWhenOutOfStock() || $this->product->getQuantity() > 0)) { ?>
                <div class="cart-button">
                    <button type="button" class="btn btn-cart" data-id="<?=$this->product->getId()?>" data-img="<?=$uniqid ?>">
                        <?=$this->translate("Add to cart")?>
                        <i class="fa fa-shopping-cart"></i>
                    </button>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>