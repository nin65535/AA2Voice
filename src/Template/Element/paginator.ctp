
<div class="paginator">
    <div class="d-flex justify-content-center">
        <?= $this->Cell('paginator'); ?>

        <?php if($this->request->getParam('controller') == 'Scenes'): ?>
        <ul class="pagination">
            <?= $this->Paginator->first('<i class="fa fa-angle-double-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->prev('<i class="fa fa-angle-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('<i class="fa fa-angle-right"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->last('<i class="fa fa-angle-double-right"></i>', ['escape' => false]) ?>
        </ul>
        <?php endif; ?>
    </div>
</div>