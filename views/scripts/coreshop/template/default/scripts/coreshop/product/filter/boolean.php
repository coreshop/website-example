<?php if(count($this->currentValues) > 0) { ?>
<div class="list-group">
    <div class="list-group-item">
        <?=$this->translate($this->label)?>
    </div>

    <div class="list-group-item">
        <div class="filter-group filter-group-checkbox">

            <?php foreach($this->currentValues as $boolName => $boolValue) {  ?>

                <label class="checkbox">
                    <input name="<?=$boolName?>" type="checkbox" value="1" <?= $boolValue == 1 ? 'checked="checked"' : ''?>>
                    <?=$this->translate($boolName)?> <?=$this->quantityUnit?>
                </label>

            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>