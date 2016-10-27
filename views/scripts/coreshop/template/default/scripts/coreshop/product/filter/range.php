<?php if(count($this->values) > 1) { ?>

    <?php
        $maxValue = ceil($this->maxValue);
        $minValue = ceil($this->minValue);
    ?>
<div class="list-group">
    <div class="list-group-item">
        <?=$this->translate($this->label)?>
    </div>

    <div class="list-group-item">
        <div class="filter-group">

            <div class="row">
                <div class="col-xs-3 text-left">
                    <strong>
                        <?php if($this->quantityUnit === "[CURRENCY]") {
                            echo CoreShop::getTools()->formatPrice($minValue);
                        } else {
                            echo $minValue . ' ' . $this->quantityUnit;
                        }
                        ?>
                    </strong>
                </div>

                <div class="col-xs-6">
                    <input title="<?=$this->translate($this->label)?>" type="text" name="<?=$this->fieldname?>" class="range-slider span2" value="" data-slider-min="<?=$minValue?>" data-slider-max="<?=$maxValue?>" data-slider-step="<?=$this->stepCount?>" data-slider-value="[<?=$this->currentValueMin?>,<?=$this->currentValueMax?>]"/>
                </div>

                <div class="col-xs-3 text-right">
                    <strong>
                        <?php if($this->quantityUnit === "[CURRENCY]") {
                            echo CoreShop::getTools()->formatPrice($maxValue);
                        } else {
                            echo $maxValue . ' ' . $this->quantityUnit;
                        }
                        ?>
                    </strong>
                </div>
            </div>
        </div>

    </div>
</div>
<?php } ?>