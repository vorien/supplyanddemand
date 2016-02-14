<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Location Inventory'), ['action' => 'add']) ?></li>
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
<div class="locationInventories index large-9 medium-8 columns content">
    <h3><?= __('Location Inventories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('location_id') ?></th>
                <th><?= $this->Paginator->sort('item_id') ?></th>
                <th><?= $this->Paginator->sort('grade_id') ?></th>
                <th><?= $this->Paginator->sort('quantity') ?></th>
                <th><?= $this->Paginator->sort('value') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locationInventories as $locationInventory): ?>
            <tr>
                <td><?= $this->Number->format($locationInventory->id) ?></td>
                <td><?= $locationInventory->has('user') ? $this->Html->link($locationInventory->user->name, ['controller' => 'Users', 'action' => 'view', $locationInventory->user->id]) : '' ?></td>
                <td><?= $locationInventory->has('location') ? $this->Html->link($locationInventory->location->name, ['controller' => 'Locations', 'action' => 'view', $locationInventory->location->id]) : '' ?></td>
                <td><?= $locationInventory->has('item') ? $this->Html->link($locationInventory->item->name, ['controller' => 'Items', 'action' => 'view', $locationInventory->item->id]) : '' ?></td>
                <td><?= $locationInventory->has('grade') ? $this->Html->link($locationInventory->grade->name, ['controller' => 'Grades', 'action' => 'view', $locationInventory->grade->id]) : '' ?></td>
                <td><?= $this->Number->format($locationInventory->quantity) ?></td>
                <td><?= $this->Number->format($locationInventory->value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $locationInventory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $locationInventory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $locationInventory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locationInventory->id)]) ?>
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
