<?=$this->template("user/helper/order-items.php", ["order" => $this->object]);?>

<?php
    if($this->object->getCustomer() instanceof CoreShop\Model\User) {
        if($this->object->getCustomer()->getIsGuest()) {
            ?>
            <a href="<?=\CoreShop::getTools()->url(array("act" => "guest-order-tracking", "lang" => $this->language), "coreshop_user")?>"><?=$this->translate("Track your order")?></a>
            <?php
        }
    }
?>
