<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Route'), ['action' => 'edit', $route->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Route'), ['action' => 'delete', $route->id], ['confirm' => __('Are you sure you want to delete # {0}?', $route->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Routes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Route'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Route Inventories'), ['controller' => 'RouteInventories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Route Inventory'), ['controller' => 'RouteInventories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Steps'), ['controller' => 'Steps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Step'), ['controller' => 'Steps', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transports'), ['controller' => 'Transports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transport'), ['controller' => 'Transports', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="routes view large-9 medium-8 columns content">
    <h3><?= h($route->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $route->has('user') ? $this->Html->link($route->user->name, ['controller' => 'Users', 'action' => 'view', $route->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($route->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Region') ?></th>
            <td><?= $route->has('region') ? $this->Html->link($route->region->name, ['controller' => 'Regions', 'action' => 'view', $route->region->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= $route->has('location') ? $this->Html->link($route->location->name, ['controller' => 'Locations', 'action' => 'view', $route->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Icon') ?></th>
            <td><?= h($route->icon) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($route->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Step') ?></th>
            <td><?= $this->Number->format($route->step) ?></td>
        </tr>
        <tr>
            <th><?= __('Pct Ns') ?></th>
            <td><?= $this->Number->format($route->pct_ns) ?></td>
        </tr>
        <tr>
            <th><?= __('Pct We') ?></th>
            <td><?= $this->Number->format($route->pct_we) ?></td>
        </tr>
        <tr>
            <th><?= __('Icon Display Size') ?></th>
            <td><?= $this->Number->format($route->icon_display_size) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Route Inventories') ?></h4>
        <?php if (!empty($route->route_inventories)): ?>
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
            <?php foreach ($route->route_inventories as $routeInventories): ?>
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
        <h4><?= __('Related Steps') ?></h4>
        <?php if (!empty($route->steps)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Step') ?></th>
                <th><?= __('Route Id') ?></th>
                <th><?= __('Location Id') ?></th>
                <th><?= __('Distance') ?></th>
                <th><?= __('Delay') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($route->steps as $steps): ?>
            <tr>
                <td><?= h($steps->id) ?></td>
                <td><?= h($steps->user_id) ?></td>
                <td><?= h($steps->step) ?></td>
                <td><?= h($steps->route_id) ?></td>
                <td><?= h($steps->location_id) ?></td>
                <td><?= h($steps->distance) ?></td>
                <td><?= h($steps->delay) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Steps', 'action' => 'view', $steps->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Steps', 'action' => 'edit', $steps->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Steps', 'action' => 'delete', $steps->id], ['confirm' => __('Are you sure you want to delete # {0}?', $steps->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Transports') ?></h4>
        <?php if (!empty($route->transports)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Icon') ?></th>
                <th><?= __('Icon Display Size') ?></th>
                <th><?= __('Volume') ?></th>
                <th><?= __('Speed') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($route->transports as $transports): ?>
            <tr>
                <td><?= h($transports->id) ?></td>
                <td><?= h($transports->user_id) ?></td>
                <td><?= h($transports->name) ?></td>
                <td><?= h($transports->icon) ?></td>
                <td><?= h($transports->icon_display_size) ?></td>
                <td><?= h($transports->volume) ?></td>
                <td><?= h($transports->speed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Transports', 'action' => 'view', $transports->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Transports', 'action' => 'edit', $transports->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transports', 'action' => 'delete', $transports->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transports->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
