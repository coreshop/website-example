<div id="main-container" class="container">

    <ol class="breadcrumb">
        <li><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language), "coreshop_index", true)?>"><?=$this->translate("Home")?></a></li>
        <li><?=$this->translate("Guest Order Tracking")?></li>
    </ol>

    <h2 class="main-heading text-center">
        <?=$this->translate("Guest Order Tracking")?>
    </h2>

    <?php
        if($this->order instanceof \CoreShop\Model\Order) {
            echo $this->template("user/helper/order-detail.php");
        }
        else {
            ?>
            <div class="panel panel-smart">
                <div class="panel-heading">
                    <h3 class="panel-title"><?=$this->translate("To track your order, please enter the following information:")?></h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="post" action="<?=\CoreShop::getTools()->url()?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="orderReference"><?=$this->translate("Order Reference")?></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="orderReference" id="orderReference" placeholder="<?=$this->translate("Order Reference")?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="email"><?=$this->translate("Email")?></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" placeholder="<?=$this->translate("Email")?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-black">
                            <?=$this->translate("Track")?>
                        </button>
                    </form>
                </div>
            </div>
            <?php
        }
    ?>
</div>