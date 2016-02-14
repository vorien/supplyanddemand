<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Transport'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transports index large-9 medium-8 columns content">
    <h3><?= __('Transports') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('icon') ?></th>
                <th><?= $this->Paginator->sort('icon_display_size') ?></th>
                <th><?= $this->Paginator->sort('volume') ?></th>
                <th><?= $this->Paginator->sort('speed') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transports as $transport): ?>
            <tr>
                <td><?= $this->Number->format($transport->id) ?></td>
                <td><?= $transport->has('user') ? $this->Html->link($transport->user->name, ['controller' => 'Users', 'action' => 'view', $transport->user->id]) : '' ?></td>
                <td><?= h($transport->name) ?></td>
                <td><?= h($transport->icon) ?></td>
                <td><?= $this->Number->format($transport->icon_display_size) ?></td>
                <td><?= $this->Number->format($transport->volume) ?></td>
                <td><?= $this->Number->format($transport->speed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $transport->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transport->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transport->id)]) ?>
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
