<div id="main-container" class="container">
    <!-- Breadcrumb Starts -->
    <ol class="breadcrumb">
        <li><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language), "coreshop_index", true)?>"><?=$this->translate("Home")?></a></li>
        <li class="active"><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "list"), "coreshop_wishlist")?>"><?=$this->translate("Wishlist")?></a></li>
    </ol>

    <!-- Breadcrumb Ends -->
    <!-- Main Heading Starts -->
    <h2 class="main-heading text-center">
        <?=$this->translate("Wishlist")?>
    </h2>

    <?php if(count($this->products) > 0) { ?>
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
                        <?=$this->translate("Price")?>
                    </td>
                    <td class="text-center">
                        <?=$this->translate("act")?>
                    </td>
                </tr>
                </thead>
                <tbody>
                <?php foreach($this->products as $product) { ?>

                    <?php
                        $href = $product->getProductUrl($this->language);
                    ?>
                    <tr class="whishlist-item">
                        <td class="text-center">
                            <?php if($product->getImage() instanceof Pimcore\Model\Asset\Image) { ?>
                                <a class="" href="<?=$href?>">
                                    <?php
                                    echo $product->getImage()->getThumbnail("coreshop_productCart")->getHtml(array("class" => "img-responsive", "alt" => $product->getName(), "title" => $product->getName()));
                                    ?>
                                </a>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <a href="<?=$href?>"><?=$product->getName()?></a>
                        </td>

                        <td class="text-right cart-item-price">
                            <?=\CoreShop::getTools()->formatPrice($product->getPrice(\CoreShop::getTools()->displayPricesWithTax()))?>
                        </td>
                        <td class="text-center">
                            <button type="button" title="<?=$this->translate("Remove")?>" class="btn btn-default tool-tip btn-wishlist-remove" data-id="<?=$product->getId()?>">
                                <i class="fa fa-times-circle"></i>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <p><?=$this->translate("Your Wishlist is empty")?></p>
    <?php } ?>

</div>