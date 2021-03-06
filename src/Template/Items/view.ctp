<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Distributions'), ['controller' => 'Distributions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Distribution'), ['controller' => 'Distributions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Location Inventories'), ['controller' => 'LocationInventories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location Inventory'), ['controller' => 'LocationInventories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Route Inventories'), ['controller' => 'RouteInventories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Route Inventory'), ['controller' => 'RouteInventories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transfers'), ['controller' => 'Transfers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transfer'), ['controller' => 'Transfers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="items view large-9 medium-8 columns content">
    <h3><?= h($item->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $item->has('user') ? $this->Html->link($item->user->name, ['controller' => 'Users', 'action' => 'view', $item->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($item->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= $item->has('type') ? $this->Html->link($item->type->name, ['controller' => 'Types', 'action' => 'view', $item->type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Icon') ?></th>
            <td><?= h($item->icon) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($item->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Icon Display Size') ?></th>
            <td><?= $this->Number->format($item->icon_display_size) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Distributions') ?></h4>
        <?php if (!empty($item->distributions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Location Id') ?></th>
                <th><?= __('Item Id') ?></th>
                <th><?= __('Grade Id') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('In Out') ?></th>
                <th><?= __('Frequency') ?></th>
                <th><?= __('Value') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->distributions as $distributions): ?>
            <tr>
                <td><?= h($distributions->id) ?></td>
                <td><?= h($distributions->user_id) ?></td>
                <td><?= h($distributions->location_id) ?></td>
                <td><?= h($distributions->item_id) ?></td>
                <td><?= h($distributions->grade_id) ?></td>
                <td><?= h($distributions->quantity) ?></td>
                <td><?= h($distributions->in_out) ?></td>
                <td><?= h($distributions->frequency) ?></td>
                <td><?= h($distributions->value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Distributions', 'action' => 'view', $distributions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Distributions', 'action' => 'edit', $distributions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Distributions', 'action' => 'delete', $distributions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $distributions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Location Inventories') ?></h4>
        <?php if (!empty($item->location_inventories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Location Id') ?></th>
                <th><?= __('Item Id') ?></th>
                <th><?= __('Grade Id') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Value') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->location_inventories as $locationInventories): ?>
            <tr>
                <td><?= h($locationInventories->id) ?></td>
                <td><?= h($locationInventories->user_id) ?></td>
                <td><?= h($locationInventories->location_id) ?></td>
                <td><?= h($locationInventories->item_id) ?></td>
                <td><?= h($locationInventories->grade_id) ?></td>
                <td><?= h($locationInventories->quantity) ?></td>
                <td><?= h($locationInventories->value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'LocationInventories', 'action' => 'view', $locationInventories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'LocationInventories', 'action' => 'edit', $locationInventories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'LocationInventories', 'action' => 'delete', $locationInventories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locationInventories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Route Inventories') ?></h4>
        <?php if (!empty($item->route_inventories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Route Id') ?></th>
                <th><?= __('Item Id') ?></th>
                <th><?= __('Grade Id') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Value') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->route_inventories as $routeInventories): ?>
            <tr>
                <td><?= h($routeInventories->id) ?></td>
                <td><?= h($routeInventories->user_id) ?></td>
                <td><?= h($routeInventories->route_id) ?></td>
                <td><?= h($routeInventories->item_id) ?></td>
                <td><?= h($routeInventories->grade_id) ?></td>
                <td><?= h($routeInventories->quantity) ?></td>
                <td><?= h($routeInventories->value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RouteInventories', 'action' => 'view', $routeInventories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RouteInventories', 'action' => 'edit', $routeInventories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RouteInventories', 'action' => 'delete', $routeInventories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routeInventories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Transfers') ?></h4>
        <?php if (!empty($item->transfers)): ?>
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
            <?php foreach ($item->transfers as $transfers): ?>
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
