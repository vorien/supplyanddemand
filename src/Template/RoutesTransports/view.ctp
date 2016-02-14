<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Routes Transport'), ['action' => 'edit', $routesTransport->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Routes Transport'), ['action' => 'delete', $routesTransport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routesTransport->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Routes Transports'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Routes Transport'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transports'), ['controller' => 'Transports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transport'), ['controller' => 'Transports', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="routesTransports view large-9 medium-8 columns content">
    <h3><?= h($routesTransport->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $routesTransport->has('user') ? $this->Html->link($routesTransport->user->name, ['controller' => 'Users', 'action' => 'view', $routesTransport->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Route') ?></th>
            <td><?= $routesTransport->has('route') ? $this->Html->link($routesTransport->route->name, ['controller' => 'Routes', 'action' => 'view', $routesTransport->route->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Transport') ?></th>
            <td><?= $routesTransport->has('transport') ? $this->Html->link($routesTransport->transport->name, ['controller' => 'Transports', 'action' => 'view', $routesTransport->transport->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($routesTransport->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($routesTransport->quantity) ?></td>
        </tr>
    </table>
</div>
