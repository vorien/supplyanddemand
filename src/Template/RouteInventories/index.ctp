<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Route Inventory'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Grades'), ['controller' => 'Grades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Grade'), ['controller' => 'Grades', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="routeInventories index large-9 medium-8 columns content">
    <h3><?= __('Route Inventories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('route_id') ?></th>
                <th><?= $this->Paginator->sort('item_id') ?></th>
                <th><?= $this->Paginator->sort('grade_id') ?></th>
                <th><?= $this->Paginator->sort('quantity') ?></th>
                <th><?= $this->Paginator->sort('value') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($routeInventories as $routeInventory): ?>
            <tr>
                <td><?= $this->Number->format($routeInventory->id) ?></td>
                <td><?= $routeInventory->has('user') ? $this->Html->link($routeInventory->user->name, ['controller' => 'Users', 'action' => 'view', $routeInventory->user->id]) : '' ?></td>
                <td><?= $routeInventory->has('route') ? $this->Html->link($routeInventory->route->name, ['controller' => 'Routes', 'action' => 'view', $routeInventory->route->id]) : '' ?></td>
                <td><?= $routeInventory->has('item') ? $this->Html->link($routeInventory->item->name, ['controller' => 'Items', 'action' => 'view', $routeInventory->item->id]) : '' ?></td>
                <td><?= $routeInventory->has('grade') ? $this->Html->link($routeInventory->grade->name, ['controller' => 'Grades', 'action' => 'view', $routeInventory->grade->id]) : '' ?></td>
                <td><?= $this->Number->format($routeInventory->quantity) ?></td>
                <td><?= $this->Number->format($routeInventory->value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $routeInventory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $routeInventory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $routeInventory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routeInventory->id)]) ?>
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
