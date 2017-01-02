<?php
echo $this->template("email/helper/layout/head.php");
echo $this->wysiwyg("text");

if($this->object instanceof \CoreShop\Model\Order)
    $this->template("email/helper/order-details.php");

echo $this->template("email/helper/layout/foot.php");
?>