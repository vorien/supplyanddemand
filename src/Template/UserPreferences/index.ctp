<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Preference'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userPreferences index large-9 medium-8 columns content">
    <h3><?= __('User Preferences') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('item_supply_border_color') ?></th>
                <th><?= $this->Paginator->sort('item_supply_border_thickness') ?></th>
                <th><?= $this->Paginator->sort('item_demand_border_color') ?></th>
                <th><?= $this->Paginator->sort('item_demand_border_thickness') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userPreferences as $userPreference): ?>
            <tr>
                <td><?= $this->Number->format($userPreference->id) ?></td>
                <td><?= $userPreference->has('user') ? $this->Html->link($userPreference->user->name, ['controller' => 'Users', 'action' => 'view', $userPreference->user->id]) : '' ?></td>
                <td><?= h($userPreference->name) ?></td>
                <td><?= h($userPreference->item_supply_border_color) ?></td>
                <td><?= $this->Number->format($userPreference->item_supply_border_thickness) ?></td>
                <td><?= h($userPreference->item_demand_border_color) ?></td>
                <td><?= $this->Number->format($userPreference->item_demand_border_thickness) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userPreference->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userPreference->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userPreference->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userPreference->id)]) ?>
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
