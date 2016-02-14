<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $grade->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $grade->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Grades'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Distributions'), ['controller' => 'Distributions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Distribution'), ['controller' => 'Distributions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Location Inventories'), ['controller' => 'LocationInventories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location Inventory'), ['controller' => 'LocationInventories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Route Inventories'), ['controller' => 'RouteInventories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Route Inventory'), ['controller' => 'RouteInventories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transfers'), ['controller' => 'Transfers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transfer'), ['controller' => 'Transfers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="grades form large-9 medium-8 columns content">
    <?= $this->Form->create($grade) ?>
    <fieldset>
        <legend><?= __('Edit Grade') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('name');
            echo $this->Form->input('background_color');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
