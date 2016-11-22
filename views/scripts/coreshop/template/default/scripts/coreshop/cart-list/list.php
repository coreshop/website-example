<div id="main-container" class="container">
    <!-- Breadcrumb Starts -->
    <ol class="breadcrumb">
        <li><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language), "coreshop_index", true)?>"><?=$this->translate("Home")?></a></li>
        <li><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "profile"), "coreshop_user")?>"><?=$this->translate("My Profile")?></a></li>
        <li class="active"><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "list"), "coreshop_cart_list")?>"><?=$this->translate("Saved Carts")?></a></li>
    </ol>

    <h2 class="main-heading text-center">
        <?=$this->translate("Saved Carts")?>
    </h2>

    <div class="table-responsive compare-table">
        <table class="table table-bordered">
            <thead>
            <tr>
                <td><?=$this->translate("Cart Name")?></td>
                <td><?=$this->translate("Date")?></td>
                <td><?=$this->translate("Total")?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <?php foreach(\CoreShop::getTools()->getUser()->getCarts() as $cart) { ?>
                <tr class="<?=$cart->isActiveCart() ? "active" : ""?>">
                    <td><?=$cart->getName()?></td>
                    <td>
                        <?php
                            $carbon = \Carbon\Carbon::createFromTimestamp($cart->getCreationDate());
                            echo $carbon->format('d.m.Y')
                        ?>
                    </td>
                    <td>
                        <?=\CoreShop::getTools()->formatPrice($cart->getTotal())?>
                    </td>
                    <td>
                        <a class="btn btn-black" href="<?=\CoreShop::getTools()->url(array("act" => "detail", "id" => $cart->getId()), "coreshop_cart_list", true)?>"><?=$this->translate("Show Detail")?></a>
                    </td>
                    <td>
                        <a class="btn btn-main" href="<?=\CoreShop::getTools()->url(array("act" => "activate", "id" => $cart->getId()), "coreshop_cart_list", true)?>"><?=$this->translate("Set Active")?></a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="<?=\CoreShop::getTools()->url(array("act" => "delete", "id" => $cart->getId()), "coreshop_cart_list", true)?>"><?=$this->translate("Delete")?></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>