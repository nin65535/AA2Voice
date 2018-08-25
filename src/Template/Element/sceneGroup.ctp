<?php

use Cake\Utility\Hash;
use App\Utility\VoiceFileName;
?>
<tbody scene_group="<?= $scene_group->scene_group ?>" >
    <?php foreach ($scene_group->scenes as $scene): ?>
        <tr scene_id="<?= $scene->id ?>">
            <th class="text-right">
                <?= $scene->id ?>
            </th>
            <?php
            if ($scene == reset($scene_group->scenes)) {
                $count = count($scene_group->scenes);
                echo "<th rowspan='{$count}' class='scene-group align-middle'>{$scene_group->scene_group}</th>";
            }
            ?>
            <th class="scene" scnene="<?= $scene->scene ?>">
                <?= substr($scene->scene, 9) ?>
            </th>
            <th>
                <?php
                $options = empty($scene->title) ? [] : ['readonly' => 'readonly'];
                echo $this->Form->control("title.{$scene->id}", ['type' => 'text', 'label' => false, 'value' => $scene->title,] + $options)
                ?>
            </th>
            <?php
            foreach ($personalities as $personality) {
                $voice = current(Hash::extract($scene, "voices.{n}[personality_id={$personality->id}]"));
                $url = VoiceFileName::get($personality->id, $scene->scene);
                if ($voice) {
                    echo "<td scene_group='{$scene_group->scene_group}' scene='{$scene->scene}' personality_id='{$personality->id}' voice_url='{$url}'>";
                    echo "<i class='fa fa-play'></i>";
                    echo "</td>";
                } else {
                    echo '<td>-</td>';
                }
            }
            ?>
        </tr>
    <?php endforeach; ?>
</tbody>