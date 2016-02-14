<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Distribution'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Grades'), ['controller' => 'Grades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Grade'), ['controller' => 'Grades', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="distributions index large-9 medium-8 columns content">
    <h3><?= __('Distributions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('location_id') ?></th>
                <th><?= $this->Paginator->sort('item_id') ?></th>
                <th><?= $this->Paginator->sort('grade_id') ?></th>
                <th><?= $this->Paginator->sort('quantity') ?></th>
                <th><?= $this->Paginator->sort('in_out') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($distributions as $distribution): ?>
            <tr>
                <td><?= $this->Number->format($distribution->id) ?></td>
                <td><?= $distribution->has('user') ? $this->Html->link($distribution->user->name, ['controller' => 'Users', 'action' => 'view', $distribution->user->id]) : '' ?></td>
                <td><?= $distribution->has('location') ? $this->Html->link($distribution->location->name, ['controller' => 'Locations', 'action' => 'view', $distribution->location->id]) : '' ?></td>
                <td><?= $distribution->has('item') ? $this->Html->link($distribution->item->name, ['controller' => 'Items', 'action' => 'view', $distribution->item->id]) : '' ?></td>
                <td><?= $distribution->has('grade') ? $this->Html->link($distribution->grade->name, ['controller' => 'Grades', 'action' => 'view', $distribution->grade->id]) : '' ?></td>
                <td><?= $this->Number->format($distribution->quantity) ?></td>
                <td><?= h($distribution->in_out) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $distribution->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $distribution->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $distribution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $distribution->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
