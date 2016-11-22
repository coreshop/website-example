<div id="main-container" class="container">
    <!-- Breadcrumb Starts -->
    <ol class="breadcrumb">
        <li><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language), "coreshop_index", true)?>"><?=$this->translate("Home")?></a></li>
        <li class="active"><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "list"), "coreshop_cart")?>"><?=$this->translate("Shopping Cart")?></a></li>
    </ol>

    <?=$this->partial("coreshop/helper/order-steps.php", array("step" => 1));?>

    <!-- Breadcrumb Ends -->
    <!-- Main Heading Starts -->
    <h2 class="main-heading text-center">
        <?=$this->translate("Shopping Cart")?>
    </h2>
    <!-- Main Heading Ends -->
    <!-- Shopping Cart Table Starts -->
    <?php if(count($this->cart->getItems()) > 0) {
        echo $this->template("coreshop/cart/helper/cart.php", array("edit" => true));
    } else { ?>
        <p><?=$this->translate("Your Shopping Cart is empty")?></p>
    <?php } ?>

    <div class="row">
        <div class="col-xs-12 col-sm-2">
            <a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language), "coreshop_index")?>" class="btn btn-default w-100">
                <?=$this->translate("Continue Shopping")?>
            </a>
        </div>
        <div class="col-xs-12 col-sm-1 col-sm-push-8">
            <?php if(\CoreShop::getTools()->getUser() instanceof \CoreShop\Model\User) { ?>
            <a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "save"), "coreshop_cart_list")?>" class="btn btn-warning w-100">
                <?=$this->translate("Save Cart")?>
            </a>
            <?php } ?>
        </div>
        <div class="col-xs-12 col-sm-1 col-sm-push-8">
            <a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "index"), "coreshop_checkout")?>" class="btn btn-main w-100">
                <?=$this->translate("Checkout")?>
            </a>
        </div>
    </div>

</div>