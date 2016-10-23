<div id="main-container" class="container">

    <ol class="breadcrumb">
        <li><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language), "coreshop_index", true)?>"><?=$this->translate("Home")?></a></li>
        <li><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "profile"), "coreshop_user")?>"><?=$this->translate("My Profile")?></a></li>
        <li><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "orders"), "coreshop_user")?>"><?=$this->translate("Orders")?></a></li>
        <li class="active"><?=$this->translate("Order")?> <?=$this->order->getOrderNumber()?></li>
    </ol>

    <h2 class="main-heading text-center">
        <?=$this->translate("Order")?>  <?=$this->order->getOrderNumber()?>
    </h2>

    <?php echo $this->template("user/helper/order-detail.php");?>
</div>