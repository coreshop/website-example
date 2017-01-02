<div id="main-container" class="container">
    <!-- Breadcrumb Starts -->
    <ol class="breadcrumb">
        <li><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language), "coreshop_index", true)?>"><?=$this->translate("Home")?></a></li>
        <li class="active"><a href="<?= \CoreShop::getTools()->url(array("lang" =>  $this->language, "act" => "password-reset-request"), "coreshop_user"); ?>"><?=$this->translate("Reset Password")?></a></li>
    </ol>
    <!-- Breadcrumb Ends -->
    <!-- Main Heading Starts -->
    <h2 class="main-heading text-center">
        <?=$this->translate("Reset your password")?>
    </h2>
    <!-- Main Heading Ends -->

    <div class="row">

        <div class="col-xs-12 col-sm-6">

            <?php if ($this->success === true) { ?>

                <strong>Thanks!</strong>
                <p>You’ll receive an email in a few minutes containing a link that will allow you to reset your password.
                    If you don’t see the email in your inbox shortly, check your spam folder.
                    Make sure your spam filters are set up to allow you to receive mail from our website.
                </p>

            <?php } else { ?>

                <form class="form" role="form" method="post" action="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "password-reset-request"), "coreshop_user")?>">

                    <?php if( !empty( $this->message ) ) { ?>
                        <div class="alert alert-danger">
                            <?= $this->message ?>
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <label for="email"><?=$this->translate("Email")?></label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="<?=$this->translate("Email")?>">
                        <p class="help-block">We'll send you a reset-link right away.</p>
                    </div>

                    <div class="input-next-button">
                        <button type="submit" class="btn btn-primary"><?= $this->translate("request password reset"); ?></button>
                    </div>
                </form>

            <?php } ?>

        </div>

    </div>

</div>