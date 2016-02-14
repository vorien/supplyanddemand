<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User Preferences'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userPreferences form large-9 medium-8 columns content">
    <?= $this->Form->create($userPreference) ?>
    <fieldset>
        <legend><?= __('Add User Preference') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('name');
            echo $this->Form->input('item_supply_border_color');
            echo $this->Form->input('item_supply_border_thickness');
            echo $this->Form->input('item_demand_border_color');
            echo $this->Form->input('item_demand_border_thickness');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
