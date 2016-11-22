<div id="main-container" class="container">
    <!-- Breadcrumb Starts -->
    <ol class="breadcrumb">
        <li><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language), "coreshop_index", true)?>"><?=$this->translate("Home")?></a></li>
        <li><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "profile"), "coreshop_user")?>"><?=$this->translate("My Profile")?></a></li>
        <li><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "list"), "coreshop_cart_list")?>"><?=$this->translate("Saved Carts")?></a></li>
        <li class="active"><?=$this->translate("Cart")?> <?=$this->cart->getName()?></li>
    </ol>

    <h2 class="main-heading text-center">
        <?=$this->translate("Shopping Cart")?>
    </h2>

    <?php if(count($this->cart->getItems()) > 0) {
        echo $this->template("coreshop/cart/helper/cart.php", array("cart" => $this->cart));
    } else { ?>
        <p><?=$this->translate("This Shopping Cart is empty")?></p>
    <?php } ?>
</div>