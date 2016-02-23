<div class="list-group">
    <div class="list-group-item">
        <?=$this->translate($this->label)?>
    </div>

    <div class="list-group-item">
        <div class="filter-group">

            <?php foreach($this->currentValues as $boolName => $boolValue) {  ?>

                <label class="checkbox">
                    <input name="<?=$boolName?>" type="checkbox" value="1" <?= $boolValue == 1 ? 'checked="checked"' : ''?>>
                    <?=$this->translate($boolName)?>
                </label>

            <?php } ?>
        </div>
    </div>
</div>