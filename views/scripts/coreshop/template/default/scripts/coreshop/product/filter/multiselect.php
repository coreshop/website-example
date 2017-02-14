<?php if(count($this->values) > 1) { ?>
<div class="list-group">
    <div class="list-group-item">
        <?=$this->translate($this->label)?>
    </div>

    <div class="list-group-item">
        <div class="filter-group filter-group-checkbox">
            <?php
            foreach($this->values as $value) {
                if(!$value['value'])
                    continue;
                ?>
                <label class="checkbox">
                    <input name="<?=$this->fieldname?>[]" type="checkbox" value="<?=$value['value']?>" <?=is_array($this->currentValues)&&in_array($value['value'],$this->currentValues) ? 'checked="checked"' : ''?>>
                    <?=$this->translate($value['value'])?> <?=$this->quantityUnit instanceof \Pimcore\Model\Object\QuantityValue\Unit ? $this->quantityUnit->getAbbreviation() : ''?>
                </label>
                <?php
            }
            ?>
        </div>

    </div>
</div>
<?php } ?>