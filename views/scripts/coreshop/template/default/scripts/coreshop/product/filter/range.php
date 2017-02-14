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
                        <?php echo $minValue?> <?=$this->quantityUnit instanceof \Pimcore\Model\Object\QuantityValue\Unit ? $this->quantityUnit->getAbbreviation() : ''?>
                    </strong>
                </div>

                <div class="col-xs-6">
                    <input title="<?=$this->translate($this->label)?>" type="text" name="<?=$this->fieldname?>" class="range-slider span2" value="" data-slider-min="<?=$minValue?>" data-slider-max="<?=$maxValue?>" data-slider-step="<?=$this->stepCount?>" data-slider-value="[<?=$this->currentValueMin?>,<?=$this->currentValueMax?>]"/>
                </div>

                <div class="col-xs-3 text-right">
                    <strong>
                        <?php echo $maxValue?> <?=$this->quantityUnit instanceof \Pimcore\Model\Object\QuantityValue\Unit ? $this->quantityUnit->getAbbreviation() : ''?>
                    </strong>
                </div>
            </div>
        </div>

    </div>
</div>
<?php } ?>