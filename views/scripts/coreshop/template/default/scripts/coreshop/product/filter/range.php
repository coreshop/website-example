<?php if(count($this->values) > 0) { ?>

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
                <div class="col-xs-3">
                    <strong><?=CoreShop::getTools()->formatPrice($minValue)?></strong>
                </div>

                <div class="col-xs-6">
                    <input title="<?=$this->translate($this->label)?>" type="text" name="<?=$this->fieldname?>" class="range-slider span2" value="" data-slider-min="<?=$minValue?>" data-slider-max="<?=$maxValue?>" data-slider-step="5" data-slider-value="[<?=$this->currentValueMin?>,<?=$this->currentValueMax?>]"/>
                </div>

                <div class="col-xs-3">
                    <strong><?=CoreShop::getTools()->formatPrice($maxValue)?></strong>
                </div>
            </div>
        </div>

    </div>
</div>
<?php } ?>