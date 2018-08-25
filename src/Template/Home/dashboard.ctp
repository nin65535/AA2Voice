
<div class="">
    <table class="table table-bordered">
        <thead class="bg-primary text-white">
            <tr>
                <th>
                    scene category
                </th>
                <th style="width:15%">
                    titled
                </th>
                <th style="width:15%">
                    not titled
                </th>
                <th style="width:15%">
                    all
                </th>
                <th style="width:15%">
                    rate
                </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach( $scenes as $scene ): ?>
            <tr>
                <th>
                    <?= $this->Html->link( h($scene->category) ,['controller'=>'Scenes','action'=>'index',$scene->category])?>
                </th>
                <td class="text-right">
                    <?= $scene->titled ?>
                </td>
                <td class="text-right">
                    <?= $scene->all - $scene->titled ?>
                </td>
                <td class="text-right">
                    <?= $scene->all ?>
                </td>
                <td class="text-right">
                    <?= sprintf('%.2f',$scene->titled / $scene->all * 100) ?>%
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>
