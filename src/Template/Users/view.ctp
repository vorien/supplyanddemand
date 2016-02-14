<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Distributions'), ['controller' => 'Distributions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Distribution'), ['controller' => 'Distributions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Grades'), ['controller' => 'Grades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grade'), ['controller' => 'Grades', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Location Inventories'), ['controller' => 'LocationInventories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location Inventory'), ['controller' => 'LocationInventories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Route Inventories'), ['controller' => 'RouteInventories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Route Inventory'), ['controller' => 'RouteInventories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Routes Transports'), ['controller' => 'RoutesTransports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Routes Transport'), ['controller' => 'RoutesTransports', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Steps'), ['controller' => 'Steps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Step'), ['controller' => 'Steps', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transfers'), ['controller' => 'Transfers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transfer'), ['controller' => 'Transfers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transports'), ['controller' => 'Transports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transport'), ['controller' => 'Transports', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Distributions') ?></h4>
        <?php if (!empty($user->distributions)): ?>
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
            <?php foreach ($user->distributions as $distributions): ?>
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
        <h4><?= __('Related Grades') ?></h4>
        <?php if (!empty($user->grades)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Background Color') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->grades as $grades): ?>
            <tr>
                <td><?= h($grades->id) ?></td>
                <td><?= h($grades->user_id) ?></td>
                <td><?= h($grades->name) ?></td>
                <td><?= h($grades->background_color) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Grades', 'action' => 'view', $grades->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Grades', 'action' => 'edit', $grades->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Grades', 'action' => 'delete', $grades->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grades->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Items') ?></h4>
        <?php if (!empty($user->items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Type Id') ?></th>
                <th><?= __('Icon') ?></th>
                <th><?= __('Icon Display Size') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->items as $items): ?>
            <tr>
                <td><?= h($items->id) ?></td>
                <td><?= h($items->user_id) ?></td>
                <td><?= h($items->name) ?></td>
                <td><?= h($items->type_id) ?></td>
                <td><?= h($items->icon) ?></td>
                <td><?= h($items->icon_display_size) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $items->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Location Inventories') ?></h4>
        <?php if (!empty($user->location_inventories)): ?>
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
            <?php foreach ($user->location_inventories as $locationInventories): ?>
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
        <?php if (!empty($user->locations)): ?>
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
            <?php foreach ($user->locations as $locations): ?>
            <tr>
                <td><?= h($locations->id) ?></td>
                <td><?= h($locations->user_id) ?></td>
                <td><?= h($locations->name) ?></td>
                <td><?= h($locations->region_id) ?></td>
                <td><?= h($locations->icon) ?></td>
                <td><?= h($locations->icon_display_size) ?></td>
                <td><?= h($locations->pct_ns) ?></td>
                <td><?= h($locations->pct_we) ?></td>
                <td><?= h($locations->waypoint) ?></td>
                <td><?= h($locations->parent_id) ?></td>
                <td><?= h($locations->lft) ?></td>
                <td><?= h($locations->rght) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Locations', 'action' => 'view', $locations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Locations', 'action' => 'edit', $locations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Locations', 'action' => 'delete', $locations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Regions') ?></h4>
        <?php if (!empty($user->regions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Image') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->regions as $regions): ?>
            <tr>
                <td><?= h($regions->id) ?></td>
                <td><?= h($regions->user_id) ?></td>
                <td><?= h($regions->name) ?></td>
                <td><?= h($regions->image) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Regions', 'action' => 'view', $regions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Regions', 'action' => 'edit', $regions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Regions', 'action' => 'delete', $regions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $regions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Route Inventories') ?></h4>
        <?php if (!empty($user->route_inventories)): ?>
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
            <?php foreach ($user->route_inventories as $routeInventories): ?>
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
        <h4><?= __('Related Routes') ?></h4>
        <?php if (!empty($user->routes)): ?>
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
            <?php foreach ($user->routes as $routes): ?>
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
        <h4><?= __('Related Routes Transports') ?></h4>
        <?php if (!empty($user->routes_transports)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Route Id') ?></th>
                <th><?= __('Transport Id') ?></th>
                <th><?= __('Quantity') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->routes_transports as $routesTransports): ?>
            <tr>
                <td><?= h($routesTransports->id) ?></td>
                <td><?= h($routesTransports->user_id) ?></td>
                <td><?= h($routesTransports->route_id) ?></td>
                <td><?= h($routesTransports->transport_id) ?></td>
                <td><?= h($routesTransports->quantity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RoutesTransports', 'action' => 'view', $routesTransports->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RoutesTransports', 'action' => 'edit', $routesTransports->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RoutesTransports', 'action' => 'delete', $routesTransports->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routesTransports->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Steps') ?></h4>
        <?php if (!empty($user->steps)): ?>
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
            <?php foreach ($user->steps as $steps): ?>
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
        <?php if (!empty($user->transfers)): ?>
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
            <?php foreach ($user->transfers as $transfers): ?>
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
        <h4><?= __('Related Transports') ?></h4>
        <?php if (!empty($user->transports)): ?>
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
            <?php foreach ($user->transports as $transports): ?>
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
    <div class="related">
        <h4><?= __('Related Types') ?></h4>
        <?php if (!empty($user->types)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->types as $types): ?>
            <tr>
                <td><?= h($types->id) ?></td>
                <td><?= h($types->user_id) ?></td>
                <td><?= h($types->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Types', 'action' => 'view', $types->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Types', 'action' => 'edit', $types->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Types', 'action' => 'delete', $types->id], ['confirm' => __('Are you sure you want to delete # {0}?', $types->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
