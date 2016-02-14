<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transport'), ['action' => 'edit', $transport->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transport'), ['action' => 'delete', $transport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transport->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transports'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transport'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transports view large-9 medium-8 columns content">
    <h3><?= h($transport->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $transport->has('user') ? $this->Html->link($transport->user->name, ['controller' => 'Users', 'action' => 'view', $transport->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($transport->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Icon') ?></th>
            <td><?= h($transport->icon) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($transport->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Icon Display Size') ?></th>
            <td><?= $this->Number->format($transport->icon_display_size) ?></td>
        </tr>
        <tr>
            <th><?= __('Volume') ?></th>
            <td><?= $this->Number->format($transport->volume) ?></td>
        </tr>
        <tr>
            <th><?= __('Speed') ?></th>
            <td><?= $this->Number->format($transport->speed) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Routes') ?></h4>
        <?php if (!empty($transport->routes)): ?>
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
            <?php foreach ($transport->routes as $routes): ?>
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
</div>
