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
<div id="footer">
    www.coreshop.org | coreshop.lineofcode.at

    <span class="pull-right">
        <span class="page"></span> / <span class="topage"></span>
    </span>
</div>

<script type="text/javascript">
    var vars={};
    var x=document.location.search.substring(1).split('&');
    for (var i in x) {var z=x[i].split('=',2);vars[z[0]] = unescape(z[1]);}
    var x=['frompage','topage','page','webpage','section','subsection','subsubsection'];
    for (var i in x) {
        var y = document.getElementsByClassName(x[i]);
        for (var j=0; j<y.length; ++j) y[j].textContent = vars[x[i]];
    }
</script>
</body>
</html>