<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
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
<body>
<header>
    <table class="table borderless">
        <tr>
            <td style="width:50%">
                <img src="/website/static/images/logo.png" title="CoreShop Demo" alt="CoreShop Demo" class="logo" />
            </td>
            <td class="text-right">
                CoreShop DEMO Address<br/>
                Phone: +43 (0) 000 / 00 00 0000
                <h1><?=$this->translate("INVOIE")?></h1>
            </td>
        </tr>
    </table>

</header>
</body>
</html>