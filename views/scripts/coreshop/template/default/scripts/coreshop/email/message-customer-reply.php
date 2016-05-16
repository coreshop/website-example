<?php
echo $this->template("email/helper/layout/head.php");
echo $this->wysiwyg("text");
if($this->thread instanceof CoreShop\Model\Messaging\Thread) {
    $url = \Pimcore\Tool::getHostUrl() . $this->url(array("lang" => $this->language, "act" => "contact", "token" => $this->thread->getToken()), "coreshop_message", true);

    echo $this->translate("In order to reply, please use the following link: ");
    echo "<br/>";
    echo '<a href="'.$url.'">'.$url.'</a>';
}
echo $this->template("email/helper/layout/foot.php");
?>