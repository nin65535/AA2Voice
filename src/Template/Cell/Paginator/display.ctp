<ul class="pagination mx-2">
    <?php
    foreach ($categories as $category) {
        $cat = $category->category;
        if (!isset($current_category) || $cat != $current_category) {
            echo "<li class='page-item'>";
            echo $this->Html->link($cat, ['controller' => 'scenes', 'action' => 'index', $cat], ['class' => 'page-link']);
            echo "</li>";
        } else {
            echo "<li class='page-item active'>";
            echo "<a class='page-link'>{$cat}</a>";
            echo "</li>";
        }
    }
    ?>
</ul>
