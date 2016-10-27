<?php
    $href = \CoreShop::getTools()->url(array("lang" => $this->language, "name" => \Pimcore\File::getValidFilename($this->product->getName()), "product" => $this->product->getId()), "coreshop_detail");
?>
<div class="col-md-4 col-sm-6">
    <div class="product-col">
        <div class="image">
            <?php if($this->product->getImage() instanceof \Pimcore\Model\Asset\Image) { ?>
                <?php if($this->product->getIsNew()) { ?>
                    <div class="image-new-badge"></div>
                <?php } ?>

                <a href="<?=$href?>">
                    <?php
                        echo $this->product->getImage()->getThumbnail("coreshop_productGrid")->getHtml(array("class" => "img-responsive", "alt" => $this->product->getName(), "id" => 'product-image' . $this->product->getId()));
                    ?>
                </a>
            <?php } ?>
        </div>
        <div class="caption">
            <h4><a href="<?=$href?>"><?=$this->product->getName()?></a></h4>
            <div class="description">
                <?=$this->product->getShortDescription();?>
            </div>
            <?php if($this->product->getAvailableForOrder()) { ?>
                <div class="price">
                    <span class="price-new"><?=\CoreShop::getTools()->formatPrice($this->product->getPrice(\CoreShop::getTools()->displayPricesWithTax()))?></span>
                    <?=$this->template("product/helper/product-savings.php");?>
                </div>
                <div class="cart-button button-group">
                    <button type="button" title="<?=$this->t("wishlist")?>" class="btn btn-wishlist" data-id="<?=$this->product->getId()?>">
                        <i class="fa fa-heart"></i>
                    </button>
                    <button type="button" title="<?=$this->t("compare")?>" class="btn btn-compare" data-id="<?=$this->product->getId()?>">
                        <i class="fa fa-bar-chart-o"></i>
                    </button>

                    <?php if(!\CoreShop\Model\Configuration::isCatalogMode() && ($this->product->isAvailableWhenOutOfStock() || $this->product->getQuantity() > 0)) { ?>
                    <button type="button" class="btn btn-cart" data-id="<?=$this->product->getId()?>" data-img="#product-image-<?=$this->product->getId()?>">
                        <?=$this->t("add to cart")?>
                        <i class="fa fa-shopping-cart"></i>
                    </button>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
