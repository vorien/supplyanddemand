<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Distribution'), ['action' => 'edit', $distribution->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Distribution'), ['action' => 'delete', $distribution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $distribution->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Distributions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Distribution'), ['action' => 'add']) ?> </li>
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
<div class="distributions view large-9 medium-8 columns content">
    <h3><?= h($distribution->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $distribution->has('user') ? $this->Html->link($distribution->user->name, ['controller' => 'Users', 'action' => 'view', $distribution->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= $distribution->has('location') ? $this->Html->link($distribution->location->name, ['controller' => 'Locations', 'action' => 'view', $distribution->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Item') ?></th>
            <td><?= $distribution->has('item') ? $this->Html->link($distribution->item->name, ['controller' => 'Items', 'action' => 'view', $distribution->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Grade') ?></th>
            <td><?= $distribution->has('grade') ? $this->Html->link($distribution->grade->name, ['controller' => 'Grades', 'action' => 'view', $distribution->grade->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($distribution->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($distribution->quantity) ?></td>
        </tr>
        <tr>
            <th><?= __('Frequency') ?></th>
            <td><?= $this->Number->format($distribution->frequency) ?></td>
        </tr>
        <tr>
            <th><?= __('Value') ?></th>
            <td><?= $this->Number->format($distribution->value) ?></td>
        </tr>
        <tr>
            <th><?= __('In Out') ?></th>
            <td><?= $distribution->in_out ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
