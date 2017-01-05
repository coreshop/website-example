<div id="main-container" class="container">
    <!-- Breadcrumb Starts -->
    <ol class="breadcrumb">
        <li><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language), "coreshop_index", true)?>"><?=$this->translate("Home")?></a></li>
        <li><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "profile"), "coreshop_user")?>"><?=$this->translate("My Profile")?></a></li>
        <li class="active"><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "orders"), "coreshop_user")?>"><?=$this->translate("Orders")?></a></li>
    </ol>
    <!-- Breadcrumb Ends -->
    <!-- Main Heading Starts -->
    <h2 class="main-heading text-center">
        <?=$this->translate("Orders")?>
    </h2>
    <!-- Main Heading Ends -->
    <div class="table-responsive compare-table">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td><?=$this->translate("Order Number")?></td>
                    <td><?=$this->translate("Date")?></td>
                    <td><?=$this->translate("Total")?></td>
                    <td><?=$this->translate("State")?></td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach(\CoreShop::getTools()->getUser()->getOrders() as $order) { ?>
                <tr>
                    <td><?=$order->getOrderNumber()?></td>
                    <td>
                        <?=$order->getOrderDate()->format('d.m.Y')?>
                    </td>
                    <td>
                        <?=$order->formatPrice($order->getTotal())?>
                    </td>
                    <td>
                        <?php $status = $order->getOrderStatus(); ?>
                        <?php if($status !== false) { ?>
                            <span class="head-el order-state">
                        <?=$this->translate("Order Status:"); ?> <strong><?=$status["translatedLabel"]?></strong>
                    </span>
                        <?php } ?>
                    </td>
                    <td>
                        <a class="btn btn-black" href="<?=\CoreShop::getTools()->url(array("act" => "order-detail", "id" => $order->getId()), "coreshop_user", true)?>"><?=$this->translate("Show Detail")?></a>
                    </td>
                    <td>
                        <a class="btn btn-green" href="<?=\CoreShop::getTools()->url(array("act" => "order-reorder", "id" => $order->getId()), "coreshop_user", true)?>"><?=$this->translate("Reorder")?></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>