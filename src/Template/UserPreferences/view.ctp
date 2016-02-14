<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Preference'), ['action' => 'edit', $userPreference->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Preference'), ['action' => 'delete', $userPreference->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userPreference->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Preferences'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Preference'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userPreferences view large-9 medium-8 columns content">
    <h3><?= h($userPreference->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $userPreference->has('user') ? $this->Html->link($userPreference->user->name, ['controller' => 'Users', 'action' => 'view', $userPreference->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($userPreference->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Item Supply Border Color') ?></th>
            <td><?= h($userPreference->item_supply_border_color) ?></td>
        </tr>
        <tr>
            <th><?= __('Item Demand Border Color') ?></th>
            <td><?= h($userPreference->item_demand_border_color) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($userPreference->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Item Supply Border Thickness') ?></th>
            <td><?= $this->Number->format($userPreference->item_supply_border_thickness) ?></td>
        </tr>
        <tr>
            <th><?= __('Item Demand Border Thickness') ?></th>
            <td><?= $this->Number->format($userPreference->item_demand_border_thickness) ?></td>
        </tr>
    </table>
</div>
