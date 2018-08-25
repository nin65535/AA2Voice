<?php ?>
<?= $this->Form->create(null); ?>
<?= $this->Form->end(); ?>
<?= $this->Element('player'); ?>
<table class="table table-bordered table-sm table-scene" set_title_url="<?= $this->Url->build(['action' => 'setTitle', '_ext' => 'json']) ?>">
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

<?php $this->append('script'); ?>
<script>
    var input;
    var playList;
    var player;
    $(function () {
        input = new Input;
        playList = new PlayList;
    });
</script>
<?php $this->end(); ?>
