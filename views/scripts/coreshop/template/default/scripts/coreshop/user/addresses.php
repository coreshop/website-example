<div id="main-container" class="container">
    <!-- Breadcrumb Starts -->
    <ol class="breadcrumb">
        <li><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language), "coreshop_index", true)?>"><?=$this->translate("Home")?></a></li>
        <li><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "profile"), "coreshop_user")?>"><?=$this->translate("My Profile")?></a></li>
        <li class="active"><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "addresses"), "coreshop_user")?>"><?=$this->translate("Addresses")?></a></li>
    </ol>
    <!-- Breadcrumb Ends -->
    <!-- Main Heading Starts -->
    <h2 class="main-heading text-center">
        <?=$this->translate("Addresses")?>
    </h2>
    <!-- Main Heading Ends -->

    <section class="addresses-area">
        <div class="row">
            <?php foreach(\CoreShop::getTools()->getUser()->getAddresses() as $address) { ?>
            <div class="col-xs-6">
                <div class="panel panel-smart">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?=$address->getName()?></h3>
                    </div>
                    <div class="panel-body">
                        <?=$this->partial("coreshop/checkout/helper/address.php", array("address" => $address)); ?>
                        <br/>
                        <a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "address" => $address->getId(), "act" => "address"), "coreshop_user")?>" class="btn btn-default">
                            <?=$this->translate("Edit");?>
                        </a>
                        <a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "address" => $address->getId(), "act" => "address-delete"), "coreshop_user")?>" class="btn btn-default">
                            <?=$this->translate("Delete");?>
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "address", "_redirect" => \CoreShop::getTools()->url(array("lang" => $this->language, "act" => "addresses"), "coreshop_user")), "coreshop_user", true)?>" class="btn btn-default">
                    <?=$this->translate("Add New");?>
                </a>
            </div>
        </div>
    </section>
</div>