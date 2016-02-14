<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Route Inventory'), ['action' => 'edit', $routeInventory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Route Inventory'), ['action' => 'delete', $routeInventory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routeInventory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Route Inventories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Route Inventory'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Grades'), ['controller' => 'Grades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grade'), ['controller' => 'Grades', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="routeInventories view large-9 medium-8 columns content">
    <h3><?= h($routeInventory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $routeInventory->has('user') ? $this->Html->link($routeInventory->user->name, ['controller' => 'Users', 'action' => 'view', $routeInventory->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Route') ?></th>
            <td><?= $routeInventory->has('route') ? $this->Html->link($routeInventory->route->name, ['controller' => 'Routes', 'action' => 'view', $routeInventory->route->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Item') ?></th>
            <td><?= $routeInventory->has('item') ? $this->Html->link($routeInventory->item->name, ['controller' => 'Items', 'action' => 'view', $routeInventory->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Grade') ?></th>
            <td><?= $routeInventory->has('grade') ? $this->Html->link($routeInventory->grade->name, ['controller' => 'Grades', 'action' => 'view', $routeInventory->grade->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($routeInventory->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($routeInventory->quantity) ?></td>
        </tr>
        <tr>
            <th><?= __('Value') ?></th>
            <td><?= $this->Number->format($routeInventory->value) ?></td>
        </tr>
    </table>
</div>
