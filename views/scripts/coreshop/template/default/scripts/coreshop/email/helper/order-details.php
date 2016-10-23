<?=$this->template("user/helper/order-items.php");?>

<?php
    if($this->order->getCustomer() instanceof CoreShop\Model\User) {
        if($this->order->getCustomer()->getIsGuest()) {
            ?>
            <a href="<?=\CoreShop::getTools()->url(array("act" => "guest-order-tracking", "lang" => $this->language), "coreshop_user")?>"><?=$this->translate("Track your order")?></a>
            <?php
        }
    }
?>
