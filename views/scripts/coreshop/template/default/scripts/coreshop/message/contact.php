<?php
    $postValue = function ($name) {
        if (isset($this->params[$name])) {
            return $this->params[$name];
        }

        return null;
    };
?>

<div id="main-container" class="container">
    <!-- Breadcrumb Starts -->
    <ol class="breadcrumb">
        <li><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language), "coreshop_index", true)?>"><?=$this->translate("Home")?></a></li>
        <li class="active"><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language), "coreshop_message", true)?>"><?=$this->translate("Contact")?></a></li>
    </ol>


    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-smart">
                <div class="panel-heading">
                    <h3 class="panel-title"><?=$this->translate("Contact Details")?></h3>
                </div>
                <div class="panel-body">
                    <ul class="list-unstyled contact-details">
                        <li class="clearfix">
                            <i class="fa fa-home pull-left"></i>
                            <span class="pull-left">
                                Dominik Pfaffenbauer<br />
                                Freiung 9-11/N3,<br />
                                Österreich
                            </span>
                        </li>
                        <li class="clearfix">
                            <i class="fa fa-phone pull-left"></i>
                            <span class="pull-left">
                                +43 660 36 177 85
                            </span>
                        </li>
                        <li class="clearfix">
                            <i class="fa fa-envelope-o pull-left"></i>
                            <span class="pull-left">
                                dominik@pfaffenbauer.at
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Contact Details Ends -->
        <!-- Contact Form Starts -->
        <div class="col-sm-8">
            <div class="panel panel-smart">
                <div class="panel-heading">
                    <h3 class="panel-title"><?=$this->translate("Send us a mail")?></h3>
                </div>

                <?php if($this->success === false) { ?>
                    <div class="alert alert-danger"><?=$this->error?></div>
                <?php } ?>

                <?php if($this->success === true) { ?>
                    <div class="alert alert-success"><?=$this->translate("Your message has been sent to our team.")?></div>
                <?php } ?>

                <?php if($this->success === false || is_null($this->success)) { ?>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post">
                            <div class="form-group">
                                <label for="contact" class="col-sm-2 control-label">
                                    <?=$this->translate("Subject")?>
                                </label>
                                <div class="col-sm-10">
                                    <select name="contact" class="form-control" id="contact">
                                        <?php foreach($this->contacts as $contact) { ?>
                                            <option value="<?=$contact->getId()?>" <?=$postValue("contact") === $contact->getId() ? 'selected="selected"' : "" ?> ><?=$contact->getName()?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">
                                    Email
                                </label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?=$postValue('email')?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="orderNumber" class="col-sm-2 control-label">
                                    <?=$this->translate("Order Number")?>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="orderNumber" id="orderNumber" placeholder="<?=$this->translate("Order Number")?>" value="<?=$postValue("orderNumber")?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message" class="col-sm-2 control-label">
                                    Message
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="message" id="message" class="form-control" rows="5" placeholder="Message"><?=$postValue("message")?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-black text-uppercase"><?=$this->translate("Send Message")?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>