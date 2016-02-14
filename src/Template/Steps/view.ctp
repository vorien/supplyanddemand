<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Step'), ['action' => 'edit', $step->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Step'), ['action' => 'delete', $step->id], ['confirm' => __('Are you sure you want to delete # {0}?', $step->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Steps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Step'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transfers'), ['controller' => 'Transfers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transfer'), ['controller' => 'Transfers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="steps view large-9 medium-8 columns content">
    <h3><?= h($step->step) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $step->has('user') ? $this->Html->link($step->user->name, ['controller' => 'Users', 'action' => 'view', $step->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Route') ?></th>
            <td><?= $step->has('route') ? $this->Html->link($step->route->name, ['controller' => 'Routes', 'action' => 'view', $step->route->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= $step->has('location') ? $this->Html->link($step->location->name, ['controller' => 'Locations', 'action' => 'view', $step->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($step->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Step') ?></th>
            <td><?= $this->Number->format($step->step) ?></td>
        </tr>
        <tr>
            <th><?= __('Distance') ?></th>
            <td><?= $this->Number->format($step->distance) ?></td>
        </tr>
        <tr>
            <th><?= __('Delay') ?></th>
            <td><?= $this->Number->format($step->delay) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Transfers') ?></h4>
        <?php if (!empty($step->transfers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Step Id') ?></th>
                <th><?= __('Location Id') ?></th>
                <th><?= __('Item Id') ?></th>
                <th><?= __('Grade Id') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Load Unload') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($step->transfers as $transfers): ?>
            <tr>
                <td><?= h($transfers->id) ?></td>
                <td><?= h($transfers->user_id) ?></td>
                <td><?= h($transfers->step_id) ?></td>
                <td><?= h($transfers->location_id) ?></td>
                <td><?= h($transfers->item_id) ?></td>
                <td><?= h($transfers->grade_id) ?></td>
                <td><?= h($transfers->quantity) ?></td>
                <td><?= h($transfers->load_unload) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Transfers', 'action' => 'view', $transfers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Transfers', 'action' => 'edit', $transfers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transfers', 'action' => 'delete', $transfers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transfers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
