<?php

use Cake\Utility\Hash;
?>
<div class="sticky-top card border-primary mb-2">
    <div class="card-body py-1">
        <?= $this->Element('player'); ?>
    </div>
</div>
<table class="table table-bordered table-sm">
    <thead class="bg-primary text-white">
        <tr>
            <th>ID</th>
            <th colspan="2">SCENE</th>
            <th>TITLE</th>
            <?php foreach ($personalities as $personality): ?>
                <th class="text-center"><?= h($personality->name) ?></th>
                <?php endforeach; ?>
        </tr>
    </thead>
    <?php
    foreach ($scene_groups as $scene_group) {
        echo $this->Element('sceneGroup', compact('scene_group'));
    }
    ?>

</table>

<?php $this->append('script', $this->Html->script('input')); ?>
<?php
$this->append('script', '<script>$(function(){ var input = new Input;});</script>');
