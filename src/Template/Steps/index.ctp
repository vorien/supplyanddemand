<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Step'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transfers'), ['controller' => 'Transfers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transfer'), ['controller' => 'Transfers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="steps index large-9 medium-8 columns content">
    <h3><?= __('Steps') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('step') ?></th>
                <th><?= $this->Paginator->sort('route_id') ?></th>
                <th><?= $this->Paginator->sort('location_id') ?></th>
                <th><?= $this->Paginator->sort('distance') ?></th>
                <th><?= $this->Paginator->sort('delay') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($steps as $step): ?>
            <tr>
                <td><?= $this->Number->format($step->id) ?></td>
                <td><?= $step->has('user') ? $this->Html->link($step->user->name, ['controller' => 'Users', 'action' => 'view', $step->user->id]) : '' ?></td>
                <td><?= $this->Number->format($step->step) ?></td>
                <td><?= $step->has('route') ? $this->Html->link($step->route->name, ['controller' => 'Routes', 'action' => 'view', $step->route->id]) : '' ?></td>
                <td><?= $step->has('location') ? $this->Html->link($step->location->name, ['controller' => 'Locations', 'action' => 'view', $step->location->id]) : '' ?></td>
                <td><?= $this->Number->format($step->distance) ?></td>
                <td><?= $this->Number->format($step->delay) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $step->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $step->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $step->id], ['confirm' => __('Are you sure you want to delete # {0}?', $step->id)]) ?>
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
