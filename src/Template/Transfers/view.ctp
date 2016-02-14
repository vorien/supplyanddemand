<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transfer'), ['action' => 'edit', $transfer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transfer'), ['action' => 'delete', $transfer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transfer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transfers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transfer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Steps'), ['controller' => 'Steps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Step'), ['controller' => 'Steps', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Grades'), ['controller' => 'Grades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grade'), ['controller' => 'Grades', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transfers view large-9 medium-8 columns content">
    <h3><?= h($transfer->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $transfer->has('user') ? $this->Html->link($transfer->user->name, ['controller' => 'Users', 'action' => 'view', $transfer->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Step') ?></th>
            <td><?= $transfer->has('step') ? $this->Html->link($transfer->step->step, ['controller' => 'Steps', 'action' => 'view', $transfer->step->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= $transfer->has('location') ? $this->Html->link($transfer->location->name, ['controller' => 'Locations', 'action' => 'view', $transfer->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Item') ?></th>
            <td><?= $transfer->has('item') ? $this->Html->link($transfer->item->name, ['controller' => 'Items', 'action' => 'view', $transfer->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Grade') ?></th>
            <td><?= $transfer->has('grade') ? $this->Html->link($transfer->grade->name, ['controller' => 'Grades', 'action' => 'view', $transfer->grade->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($transfer->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($transfer->quantity) ?></td>
        </tr>
        <tr>
            <th><?= __('Load Unload') ?></th>
            <td><?= $transfer->load_unload ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
