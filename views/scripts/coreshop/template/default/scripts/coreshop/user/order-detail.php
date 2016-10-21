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
                <?php foreach($this->order->getOrderStateHistory() as $orderStateNote) { ?>
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
                            $state = \CoreShop\Model\Order\State::getById($orderStateNote->getData()['toState']['data']);

                            if($state instanceof \CoreShop\Model\Order\State) {
                                echo $state->getName();
                            }
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

</div>