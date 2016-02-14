<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Location'), ['action' => 'edit', $location->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Location'), ['action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Distributions'), ['controller' => 'Distributions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Distribution'), ['controller' => 'Distributions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Location Inventories'), ['controller' => 'LocationInventories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location Inventory'), ['controller' => 'LocationInventories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Steps'), ['controller' => 'Steps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Step'), ['controller' => 'Steps', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transfers'), ['controller' => 'Transfers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transfer'), ['controller' => 'Transfers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Warehouses'), ['controller' => 'Warehouses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Warehouse'), ['controller' => 'Warehouses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="locations view large-9 medium-8 columns content">
    <h3><?= h($location->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $location->has('user') ? $this->Html->link($location->user->name, ['controller' => 'Users', 'action' => 'view', $location->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($location->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Region') ?></th>
            <td><?= $location->has('region') ? $this->Html->link($location->region->name, ['controller' => 'Regions', 'action' => 'view', $location->region->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Icon') ?></th>
            <td><?= h($location->icon) ?></td>
        </tr>
        <tr>
            <th><?= __('Parent Location') ?></th>
            <td><?= $location->has('parent_location') ? $this->Html->link($location->parent_location->name, ['controller' => 'Locations', 'action' => 'view', $location->parent_location->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($location->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Icon Display Size') ?></th>
            <td><?= $this->Number->format($location->icon_display_size) ?></td>
        </tr>
        <tr>
            <th><?= __('Pct Ns') ?></th>
            <td><?= $this->Number->format($location->pct_ns) ?></td>
        </tr>
        <tr>
            <th><?= __('Pct We') ?></th>
            <td><?= $this->Number->format($location->pct_we) ?></td>
        </tr>
        <tr>
            <th><?= __('Lft') ?></th>
            <td><?= $this->Number->format($location->lft) ?></td>
        </tr>
        <tr>
            <th><?= __('Rght') ?></th>
            <td><?= $this->Number->format($location->rght) ?></td>
        </tr>
        <tr>
            <th><?= __('Waypoint') ?></th>
            <td><?= $location->waypoint ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Distributions') ?></h4>
        <?php if (!empty($location->distributions)): ?>
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
            <?php foreach ($location->distributions as $distributions): ?>
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
        <?php if (!empty($location->location_inventories)): ?>
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
            <?php foreach ($location->location_inventories as $locationInventories): ?>
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
        <h4><?= __('Related Locations') ?></h4>
        <?php if (!empty($location->child_locations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Region Id') ?></th>
                <th><?= __('Icon') ?></th>
                <th><?= __('Icon Display Size') ?></th>
                <th><?= __('Pct Ns') ?></th>
                <th><?= __('Pct We') ?></th>
                <th><?= __('Waypoint') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Lft') ?></th>
                <th><?= __('Rght') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($location->child_locations as $childLocations): ?>
            <tr>
                <td><?= h($childLocations->id) ?></td>
                <td><?= h($childLocations->user_id) ?></td>
                <td><?= h($childLocations->name) ?></td>
                <td><?= h($childLocations->region_id) ?></td>
                <td><?= h($childLocations->icon) ?></td>
                <td><?= h($childLocations->icon_display_size) ?></td>
                <td><?= h($childLocations->pct_ns) ?></td>
                <td><?= h($childLocations->pct_we) ?></td>
                <td><?= h($childLocations->waypoint) ?></td>
                <td><?= h($childLocations->parent_id) ?></td>
                <td><?= h($childLocations->lft) ?></td>
                <td><?= h($childLocations->rght) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Locations', 'action' => 'view', $childLocations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Locations', 'action' => 'edit', $childLocations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Locations', 'action' => 'delete', $childLocations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childLocations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Routes') ?></h4>
        <?php if (!empty($location->routes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Step') ?></th>
                <th><?= __('Region Id') ?></th>
                <th><?= __('Location Id') ?></th>
                <th><?= __('Pct Ns') ?></th>
                <th><?= __('Pct We') ?></th>
                <th><?= __('Icon') ?></th>
                <th><?= __('Icon Display Size') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($location->routes as $routes): ?>
            <tr>
                <td><?= h($routes->id) ?></td>
                <td><?= h($routes->user_id) ?></td>
                <td><?= h($routes->name) ?></td>
                <td><?= h($routes->step) ?></td>
                <td><?= h($routes->region_id) ?></td>
                <td><?= h($routes->location_id) ?></td>
                <td><?= h($routes->pct_ns) ?></td>
                <td><?= h($routes->pct_we) ?></td>
                <td><?= h($routes->icon) ?></td>
                <td><?= h($routes->icon_display_size) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Routes', 'action' => 'view', $routes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Routes', 'action' => 'edit', $routes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Routes', 'action' => 'delete', $routes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Steps') ?></h4>
        <?php if (!empty($location->steps)): ?>
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
            <?php foreach ($location->steps as $steps): ?>
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
        <h4><?= __('Related Transfers') ?></h4>
        <?php if (!empty($location->transfers)): ?>
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
            <?php foreach ($location->transfers as $transfers): ?>
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
    <div class="related">
        <h4><?= __('Related Warehouses') ?></h4>
        <?php if (!empty($location->warehouses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Location Id') ?></th>
                <th><?= __('Icon') ?></th>
                <th><?= __('Icon Display Size') ?></th>
                <th><?= __('Volume') ?></th>
                <th><?= __('Value') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($location->warehouses as $warehouses): ?>
            <tr>
                <td><?= h($warehouses->id) ?></td>
                <td><?= h($warehouses->user_id) ?></td>
                <td><?= h($warehouses->name) ?></td>
                <td><?= h($warehouses->location_id) ?></td>
                <td><?= h($warehouses->icon) ?></td>
                <td><?= h($warehouses->icon_display_size) ?></td>
                <td><?= h($warehouses->volume) ?></td>
                <td><?= h($warehouses->value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Warehouses', 'action' => 'view', $warehouses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Warehouses', 'action' => 'edit', $warehouses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Warehouses', 'action' => 'delete', $warehouses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $warehouses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
