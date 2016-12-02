<?php if(count($this->conditions) > 0) { ?>
    <div class="list-group">
        <div class="list-group-item">
            <?=$this->translate($this->label)?>
        </div>

        <div class="list-group-item">
            <div class="filter-group">

                <?php foreach($this->conditions as $condition) {
                    if($condition instanceof \CoreShop\Model\Product\Filter\Condition\AbstractCondition) {
                        echo $condition->render($this->filter, $this->list, $this->currentFilter);
                    }
                } ?>
            </div>
        </div>
    </div>
<?php } ?>