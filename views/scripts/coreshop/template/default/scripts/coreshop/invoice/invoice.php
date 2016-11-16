<?php

$this->billingAddress = $this->order->getBillingAddress();
$this->shippingAddress = $this->order->getShippingAddress();
$this->billingAndShippingEqual = $this->order->isShippingAndBillingAddressEqual();

if(!$this->billingAddress || !$this->shippingAddress) {
    die("no shipping or billing address definied");
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <base href="<?=\Pimcore\Tool::getHostUrl()?>">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Invoice <?=$this->order->getOrderNumber()?></title>

    <!-- Google Web Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,700,300,600,800,400" rel="stylesheet" type="text/css">

    <!-- CSS Files -->
    <link href="/website/static/css/invoice.css" rel="stylesheet">
</head>
<body class="lang-<?=$this->language?> body">
<div class="padding">

    <div class="meta-info">
        <div class="row">
            <div class="col-xs-8">
                <div class="row">
                    <div class="col-xs-2">
                        <strong><?=$this->translate("Customer");?></strong>
                    </div>
                    <div class="col-xs-10">
                        <?=$this->order->getCustomer()->getFirstname()?> <?=$this->order->getCustomer()->getLastname()?><br/>
                        <?=$this->billingAddress->getStreet(); ?> <?=$this->billingAddress->getNr(); ?><br/>
                        <?=$this->billingAddress->getZip(); ?> <?=$this->billingAddress->getCity(); ?><br/>
                        <?=$this->billingAddress->getCountry()->getName(); ?>
                        <?=$this->billingAddress->getVatNumber();?>
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="row">
                    <div class="col-xs-7">
                        <?=$this->translate("Date")?>
                    </div>
                    <div class="col-xs-5 text-right">
                        <?=$this->order->getOrderDate()->format("d.M.y")?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-7">
                        <?=$this->translate("Invoice Number")?>
                    </div>
                    <div class="col-xs-5 text-right">
                        <?=$this->order->getOrderNumber()?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        &nbsp;
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <?=$this->translate("Delivery Date = Invoice Date")?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->template("invoice/helper/items.php")?>

    <div class="row">
        <div class="col-xs-8">
            <div class="row">
                <div class="col-xs-2">
                    <strong><?=$this->translate("PAYMENT")?></strong>
                </div>
                <div class="col-xs-10">
                    <?php echo $this->translate($this->order->getPaymentProvider()); ?>
                </div>
            </div>
        </div>
    </div>

    <hr/>

    <p class="bottom">
        <strong>Bank Information</strong>: CoreShop DEMO<br/>
        <strong>IBAN</strong>: DEMOIBAN | <strong>BIC</strong>: DEMOBIC
    </p>

</div>
</body>
</html>