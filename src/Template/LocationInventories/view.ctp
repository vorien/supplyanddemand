<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Location Inventory'), ['action' => 'edit', $locationInventory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Location Inventory'), ['action' => 'delete', $locationInventory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locationInventory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Location Inventories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location Inventory'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Grades'), ['controller' => 'Grades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grade'), ['controller' => 'Grades', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="locationInventories view large-9 medium-8 columns content">
    <h3><?= h($locationInventory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $locationInventory->has('user') ? $this->Html->link($locationInventory->user->name, ['controller' => 'Users', 'action' => 'view', $locationInventory->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= $locationInventory->has('location') ? $this->Html->link($locationInventory->location->name, ['controller' => 'Locations', 'action' => 'view', $locationInventory->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Item') ?></th>
            <td><?= $locationInventory->has('item') ? $this->Html->link($locationInventory->item->name, ['controller' => 'Items', 'action' => 'view', $locationInventory->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Grade') ?></th>
            <td><?= $locationInventory->has('grade') ? $this->Html->link($locationInventory->grade->name, ['controller' => 'Grades', 'action' => 'view', $locationInventory->grade->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($locationInventory->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($locationInventory->quantity) ?></td>
        </tr>
        <tr>
            <th><?= __('Value') ?></th>
            <td><?= $this->Number->format($locationInventory->value) ?></td>
        </tr>
    </table>
</div>
