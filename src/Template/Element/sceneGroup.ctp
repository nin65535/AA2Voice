<?php

use Cake\Utility\Hash;
?>
<tbody scene_group="<?= $scene_group->scene_group ?>" >
    <?php foreach ($scene_group->scenes as $scene): ?>
        <tr>
            <th class="text-right">
                <?= $scene->id ?>
            </th>
            <?php
            if ($scene == reset($scene_group->scenes)) {
                $count = count($scene_group->scenes);
                echo "<th rowspan='{$count}' class='scene-group align-middle'>{$scene_group->scene_group}</th>";
            }
            ?>
            <th>
                <?= substr($scene->scene, 9) ?>
            </th>
            <th><?= $this->Form->control("title.{$scene->id}", ['type' => 'text', 'label' => false, 'value' => $scene->title , 'disabled']) ?></th>
            <?php
            foreach ($personalities as $personality) {
                $voice = current(Hash::extract($scene, "voices.{n}[personality_id={$personality->id}]"));
                echo "<td personality_id='{$personality->id}'>";
                if ($voice) {
                    echo "<i class='fa fa-play'></i>";
                } else {
                    echo '-';
                }
                echo "</td>";
            }
            ?>
        </tr>
    <?php endforeach; ?>
</tbody>