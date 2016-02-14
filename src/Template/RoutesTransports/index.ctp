<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Routes Transport'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transports'), ['controller' => 'Transports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transport'), ['controller' => 'Transports', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="routesTransports index large-9 medium-8 columns content">
    <h3><?= __('Routes Transports') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('route_id') ?></th>
                <th><?= $this->Paginator->sort('transport_id') ?></th>
                <th><?= $this->Paginator->sort('quantity') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($routesTransports as $routesTransport): ?>
            <tr>
                <td><?= $this->Number->format($routesTransport->id) ?></td>
                <td><?= $routesTransport->has('user') ? $this->Html->link($routesTransport->user->name, ['controller' => 'Users', 'action' => 'view', $routesTransport->user->id]) : '' ?></td>
                <td><?= $routesTransport->has('route') ? $this->Html->link($routesTransport->route->name, ['controller' => 'Routes', 'action' => 'view', $routesTransport->route->id]) : '' ?></td>
                <td><?= $routesTransport->has('transport') ? $this->Html->link($routesTransport->transport->name, ['controller' => 'Transports', 'action' => 'view', $routesTransport->transport->id]) : '' ?></td>
                <td><?= $this->Number->format($routesTransport->quantity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $routesTransport->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $routesTransport->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $routesTransport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routesTransport->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
