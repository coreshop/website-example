<div id="main-container" class="container">
    <!-- Breadcrumb Starts -->
    <ol class="breadcrumb">
        <li><a href="<?=\CoreShop::getTools()->url(array("lang" => $this->language), "coreshop_index", true)?>"><?=$this->translate("Home")?></a></li>
        <li class="active"><?=$this->translate("Reset Password")?></li>
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

                <strong>Perfect!</strong>
                <p>Your password has been changed. please click <a href="<?= \CoreShop::getTools()->url(["lang" => $this->language, "act" => "login"], "coreshop_user", true); ?>">here</a> to login with your new password.</p>

            <?php } else { ?>

                <?php if( !empty( $this->message ) ) { ?>
                    <div class="alert alert-danger">
                        <?= $this->message ?>
                    </div>
                <?php } ?>

                <?php if($this->showForm) { ?>
                    <div class="block">
                        <div class="block-head">
                            <h5>Enter your new password</h5>
                        </div>
                    </div>

                    <form class="form" role="form" method="post" action="<?=\CoreShop::getTools()->url(array("lang" => $this->language, "act" => "password-reset"), "coreshop_user")?>">

                        <div class="form-group">
                            <label for="password"><?=$this->translate("Password")?></label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label for="passwordRe"><?=$this->translate("Re-Password")?></label>
                            <input type="password" class="form-control" name="passwordRe" id="passwordRe">
                        </div>

                        <div class="input-next-button">
                            <button type="submit" class="btn btn-primary"><?= $this->translate("reset password"); ?></button>
                        </div>
                    </form>
                <?php } ?>

            <?php } ?>

        </div>

    </div>

</div>
