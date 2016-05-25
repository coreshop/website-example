<div class="container shop checkout checkout-step-5">
    <?=$this->partial("coreshop/helper/order-steps.php", array("step" => 5));?>

    <?php
        echo $this->render($this->paymentViewScript);
    ?>
</div>
