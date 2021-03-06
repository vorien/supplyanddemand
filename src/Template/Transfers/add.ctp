<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Transfers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Steps'), ['controller' => 'Steps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Step'), ['controller' => 'Steps', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Grades'), ['controller' => 'Grades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Grade'), ['controller' => 'Grades', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transfers form large-9 medium-8 columns content">
    <?= $this->Form->create($transfer) ?>
    <fieldset>
        <legend><?= __('Add Transfer') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('step_id', ['options' => $steps, 'empty' => true]);
            echo $this->Form->input('location_id', ['options' => $locations, 'empty' => true]);
            echo $this->Form->input('item_id', ['options' => $items, 'empty' => true]);
            echo $this->Form->input('grade_id', ['options' => $grades, 'empty' => true]);
            echo $this->Form->input('quantity');
            echo $this->Form->input('load_unload');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
