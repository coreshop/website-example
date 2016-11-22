<div id="main-container" class="container">
    <!-- Breadcrumb Starts -->
    <ol class="breadcrumb">
        <li><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language), "coreshop_index", true)?>"><?=$this->translate("Home")?></a></li>
        <li class="active"><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "profile"), "coreshop_user")?>"><?=$this->translate("My Profile")?></a></li>
    </ol>
    <!-- Breadcrumb Ends -->
    <!-- Main Heading Starts -->
    <h2 class="main-heading text-center">
        <?=$this->translate("My Account")?>
    </h2>
    <!-- Main Heading Ends -->

    <div class="list-group">
        <a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "orders"), "coreshop_user")?>" title="<?=$this->translate("Orders")?>" class="list-group-item">
            <i class="fa fa-list-ol"></i>
            <span><?=$this->translate("Order history and details")?></span>
        </a>
        <a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "addresses"), "coreshop_user")?>" title="<?=$this->translate("Addresses")?>" class="list-group-item">
            <i class="fa fa-building"></i>
            <span><?=$this->translate("My Addresses")?></span>
        </a>
        <a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "settings"), "coreshop_user")?>" title="<?=$this->translate("Information")?>" class="list-group-item">
            <i class="fa fa-user"></i>
            <span><?=$this->translate("My Personal Information")?></span>
        </a>
        <a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "list"), "coreshop_cart_list")?>" title="<?=$this->translate("Saved Carts")?>" class="list-group-item">
            <i class="fa fa-shopping-cart"></i>
            <span><?=$this->translate("Saved Carts")?></span>
        </a>
    </div>
</div>