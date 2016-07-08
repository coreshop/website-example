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

    <?php echo $this->headTitle($this->document->getProperty("title"))?>

    <!-- Google Web Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700" rel="stylesheet" type="text/css">

    <!-- CSS Files -->
    <link href="/website/static/css/owl.carousel.css" rel="stylesheet">
    <?php if(\CoreShop\Model\Shop::getShop()->getId() === \CoreShop\Model\Shop::getDefaultShop()->getId()) { ?>
        <link href="/website/static/css/shop.css" rel="stylesheet">
    <?php } else { ?>
        <link href="/website/static/css/shop2.css" rel="stylesheet">
    <?php } ?>

    <!--[if lt IE 9]>
        <script src="/website/static/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <!--<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/website/static/images/fav-144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/website/static/images/fav-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/website/static/images/fav-72.png">
    <link rel="apple-touch-icon-precomposed" href="/website/static/images/fav-57.png">
    <link rel="shortcut icon" href="/website/static/images/fav.png">-->

</head>
<body class="lang-<?=$this->language?>">

    <?php if($this->config->coreshop_demo) { ?>
        <!-- DEMO BANNER -->
        <div class="demo-banner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <?php echo $this->translate("This Shop is only for DEMO purpose. All products listed cannot be ordered and will not be shipped!"); ?>
                    </div>
                </div>
            </div>
        </div>
        <!--/ DEMO BANNER -->
    <?php } ?>

<!-- Header Section Starts -->
    <header id="header-area">
    <!-- Header Top Starts -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                <!-- Header Links Starts -->
                    <div class="col-sm-8 col-xs-12">
                        <div class="header-links">

                            <ul class="nav navbar-nav pull-left">
                                <li>
                                    <a href="<?=$this->url(array("lang" => $this->language), "coreshop_index")?>">
                                        <i class="fa fa-home hidden-lg hidden-md" title="<?=$this->translate("Home")?>"></i>
                                        <span class="hidden-sm hidden-xs">
                                            <?=$this->translate("Home")?>
                                        </span>
                                    </a>
                                </li>
                                <?php if(!\CoreShop\Model\Configuration::isCatalogMode()) { ?>
                                    <?php if($this->session->user instanceof \CoreShop\Model\User && !$this->session->user->getIsGuest()) { ?>
                                        <li>
                                            <a href="<?=$this->url(array("lang" => $this->language, "act" => "profile"), "coreshop_user")?>">
                                                <i class="fa fa-user hidden-lg hidden-md" title="<?=$this->translate("My Account")?>"></i>
                                                <span class="hidden-sm hidden-xs">
                                                    <?=$this->translate("My Account")?>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?=$this->url(array("lang" => $this->language, "act" => "list"), "coreshop_cart")?>">
                                                <i class="fa fa-shopping-cart hidden-lg hidden-md" title="<?=$this->translate("Shopping Cart")?>"></i>
                                                <span class="hidden-sm hidden-xs">
                                                    <?=$this->translate("Shopping Cart")?>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?=$this->url(array("lang" => $this->language, "act" => "index"), "coreshop_checkout")?>">
                                                <i class="fa fa-crosshairs hidden-lg hidden-md" title="<?=$this->translate("Checkout")?>"></i>
                                                <span class="hidden-sm hidden-xs">
                                                    <?=$this->translate("Checkout")?>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?=$this->url(array("lang" => $this->language, "act" => "logout"), "coreshop_user")?>">
                                                <i class="fa fa-crosshairs hidden-lg hidden-md" title="<?=$this->translate("Logout")?>"></i>
                                                <span class="hidden-sm hidden-xs">
                                                    <?=$this->translate("Logout")?>
                                                </span>
                                            </a>
                                        </li>
                                    <?php } else { ?>
                                    <li>
                                        <a href="<?=$this->url(array("lang" => $this->language, "act" => "register"), "coreshop_user")?>">
                                            <i class="fa fa-unlock hidden-lg hidden-md" title="Register"></i>
                                            <span class="hidden-sm hidden-xs">
                                                <?=$this->translate("Register")?>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=$this->url(array("lang" => $this->language, "act" => "login"), "coreshop_user")?>">
                                            <i class="fa fa-lock hidden-lg hidden-md" title="Login"></i>
                                            <span class="hidden-sm hidden-xs">
                                                <?=$this->translate("Login")?>
                                            </span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <li>
                                        <a href="<?=$this->url(array("lang" => $this->language, "act" => "contact"), "coreshop_message")?>">
                                            <i class="fa fa-home hidden-lg hidden-md" title="<?=$this->translate("Contact")?>"></i>
                                            <span class="hidden-sm hidden-xs">
                                                <?=$this->translate("Contact")?>
                                            </span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                <!-- Header Links Ends -->
                <!-- Currency & Languages Starts -->
                    <div class="col-sm-4 col-xs-12">

                        <div class="pull-right">

                            <div class="btn-group">
                                <a class="btn btn-link" href="<?=$this->url(array("lang" => $this->language, "act" => "list"), "coreshop_compare")?>">
                                    <?=$this->translate("Compare")?>
                                </a>
                            </div>

                            <div class="btn-group">
                                <a class="btn btn-link" href="<?=$this->url(array("lang" => $this->language, "act" => "list"), "coreshop_wishlist")?>">
                                    <?=$this->translate("Wishlist")?>
                                </a>
                            </div>

                            <!-- Currency Starts -->
                            <div class="btn-group">
                                <button class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                    <?=$this->translate("Currency")?>
                                    <i class="fa fa-caret-down"></i>
                                </button>
                                <ul class="pull-right dropdown-menu">
                                    <?php foreach(\CoreShop\Model\Currency::getAvailable() as $currency) { ?>
                                    <li><a tabindex="-1" href="<?=$this->url(array("lang" => $this->language, "currency" => $currency->getId(), "redirect" => $this->url()), "coreshop_change_currency")?>"><?=$currency->getName()?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <!-- Currency Ends -->

                        <!-- Languages Starts -->
                            <div class="btn-group">
                                <button class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                    <?=$this->translate("Language")?>
                                    <i class="fa fa-caret-down"></i>
                                </button>
                                <ul class="pull-right dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="<?=$this->url(array("lang" => "en"), "coreshop_index", true)?>"><?=$this->translate("English")?></a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="<?=$this->url(array("lang" => "de"), "coreshop_index", true)?>"><?=$this->translate("German")?></a>
                                    </li>
                                </ul>
                            </div>
                        <!-- Languages Ends -->
                        </div>
                    </div>
                <!-- Currency & Languages Ends -->
                </div>
            </div>
        </div>
    <!-- Header Top Ends -->
    <!-- Main Header Starts -->
        <div class="main-header">
            <div class="container">
                <div class="row">
                <!-- Search Starts -->
                    <div class="col-md-3">
                        <form id="search" method="get" action="<?=$this->url(array("lang" => $this->language), "coreshop_search", true)?>">
                            <div class="input-group">
                              <input type="text" name="text" class="form-control input-lg" placeholder="<?=$this->translate("Search")?>">
                              <span class="input-group-btn">
                                <button class="btn btn-lg" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                              </span>
                            </div>
                        </form>
                    </div>
                <!-- Search Ends -->
                <!-- Logo Starts -->
                    <div class="col-md-6">
                        <div id="logo">
                            <a href="<?=$this->url(array("lang" => $this->language), "coreshop_index", true)?>">
                                <img src="/website/static/images/logo.png" title="Spice Shoppe" alt="CoreShop" class="img-responsive" />
                                Core<span class="black">Shop</span>
                            </a>
                        </div>
                    </div>
                <!-- Logo Starts -->
                <!-- Shopping Cart Starts -->
                    <div class="col-md-3">
                        <?php if(!\CoreShop\Model\Configuration::isCatalogMode()) { ?>
                            <?=$this->template("coreshop/cart/helper/minicart.php") ?>
                        <?php } ?>
                    </div>
                <!-- Shopping Cart Ends -->
                </div>
            </div>
        </div>
        <?=$this->inc("/" . $this->language . "/shop/snippet/menu")?>
    <!-- Main Header Ends -->
    </header>
<!-- Header Section Ends -->

<?= $this->layout()->content ?>

<!-- Footer Section Starts -->
    <footer id="footer-area">
    <!-- Footer Links Starts -->
        <?=$this->inc("/" . $this->language . "/shop/snippet/footer")?>
    <!-- Copyright Area Ends -->
    </footer>
<!-- Footer Section Ends -->
<!-- JavaScript Files -->

    <script type="text/javascript">

        var coreshop_language = "<?=$this->language?>";

    </script>
<script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>
<script src="/website/static/vendor/jquery-1.11.1.min.js"></script>
<script src="/website/static/vendor/jquery-migrate-1.2.1.min.js"></script>
<script src="/website/static/vendor/bootstrap.min.js"></script>
<script src="/website/static/vendor/bootstrap-hover-dropdown.min.js"></script>
<script src="/website/static/vendor/bootstrapvalidator/bootstrapValidator.min.js"></script>
<script src="/website/static/vendor/jquery.magnific-popup.min.js"></script>
<script src="/website/static/vendor/owl.carousel.min.js"></script>
<script src="/website/static/vendor/purl.js"></script>
<script src="/website/static/js/shop.js"></script>
<script src="/website/static/js/map.js"></script>
<script src="/website/static/js/custom.js"></script>
</body>
</html>