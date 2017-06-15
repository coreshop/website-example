<?php if($this->messageSent) { ?>
    <p class="alert alert-success">
        <?=$this->translate("Message successfully sent")?>
    </p>
<?php } ?>

<div class="table-responsive order-table">
    <table class="table table-bordered" style="width:100%;">
        <thead>
        <tr>
            <td width="10%">
                <?=$this->translate("Date")?>
            </td>
            <td>
                <?=$this->translate("State")?>
            </td>
        </tr>
        </thead>
        <tbody>
        <?php foreach(\CoreShop\Model\Order\State::getOrderStateHistory($this->order) as $orderStateNote) { ?>
            <tr>
                <td class="text-left">
                    <?php
                    $date = new \Pimcore\Date();
                    $date->setTimestamp($orderStateNote->getDate());

                    echo $date->get('d.M.Y');
                    ?>
                </td>
                <td class="text-left">
                    <?php
                        echo $orderStateNote->getTitle();
                    ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6">
        <div class="panel panel-smart">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <?=$this->translate("Shipping Address")?>
                </h4>
            </div>
            <div class="panel-body panel-delivery-address">
                <?=$this->partial("coreshop/checkout/helper/address.php", array("address" => $this->order->getShippingAddress()))?>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <div class="panel panel-smart">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <?=$this->translate("Billing Address")?>
                </h4>
            </div>
            <div class="panel-body panel-delivery-address">
                <?=$this->partial("coreshop/checkout/helper/address.php", array("address" => $this->order->getBillingAddress()))?>
            </div>
        </div>
    </div>
</div>

<?=$this->template("user/helper/order-items.php");?>


<div class="messaging">
    <?php if(is_array($this->order->getCustomerThreads()) && count($this->order->getCustomerThreads()) > 0) { ?>
        <div class="panel panel-smart">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <?=$this->translate("Messages")?>
                </h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive order-table">
                    <table class="table table-bordered" style="width:100%;">
                        <thead>
                        <tr>
                            <td width="10%">
                                <?=$this->translate("From")?>
                            </td>
                            <td>
                                <?=$this->translate("Message")?>
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($this->order->getCustomerThreads() as $thread) {
                            foreach($thread->getMessages() as $message) {
                                if($message instanceof \CoreShop\Model\Messaging\Message) { ?>
                                    <tr>
                                        <td>
                                            <strong>
                                                <?php
                                                if($message->getAdminUserId()) {
                                                    $user = \Pimcore\Model\User::getById($message->getAdminUserId());

                                                    if($user instanceof \Pimcore\Model\User) {
                                                        echo $user->getFirstname() . " " . $user->getLastname();
                                                    }
                                                }
                                                else {
                                                    echo $thread->getUser()->getFirstname() . " " . $thread->getUser()->getLastname();
                                                }
                                                ?>
                                            </strong>
                                            <br/>

                                            <?php
                                            $date = new \Pimcore\Date();
                                            $date->setTimestamp($message->getCreationDate());
                                            echo $date->get("d.M.Y");
                                            ?>
                                        </td>
                                        <td>
                                            <?=$message->getMessage()?>
                                        </td>
                                    </tr>
                                <?php }
                            }
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="panel panel-smart">
        <div class="panel-heading">
            <h4 class="panel-title">
                <?=$this->translate("Add a Message")?>
            </h4>
        </div>
        <div class="panel-body">
            <form method="post" action="<?=\CoreShop::getTools()->url(array("act" => "order-detail-message"), "coreshop_user", true)?>">
                <input type="hidden" name="id" value="<?=$this->order->getId()?>" />

                <p><?=$this->translate("If you would like to add a comment about your order, please write it in the field below.")?></p>
                <p class="form-group">
                    <label for="product"><?=$this->translate("Product")?></label>
                    <select id="product" name="product" class="form-control">
                        <option value="0">-- <?=$this->translate("Choose")?> --</option>
                        <?php foreach($this->order->getItems() as $item) { ?>
                            <?php if($item->getProduct() instanceof \CoreShop\Model\Product) { ?>
                                <option value="<?=$item->getProduct()->getId()?>"><?=$item->getProduct()->getName()?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </p>
                <p class="form-group">
                    <textarea class="form-control" cols="67" rows="3" name="text"></textarea>
                </p>

                <div class="form-group">
                    <button type="submit" class="btn btn-black text-uppercase"><?=$this->translate("Send Message")?></button>
                </div>
            </form>
        </div>
    </div>
</div>
