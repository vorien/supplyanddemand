<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $transport->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $transport->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Transports'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transports form large-9 medium-8 columns content">
    <?= $this->Form->create($transport) ?>
    <fieldset>
        <legend><?= __('Edit Transport') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('name');
            echo $this->Form->input('icon');
            echo $this->Form->input('icon_display_size');
            echo $this->Form->input('volume');
            echo $this->Form->input('speed');
            echo $this->Form->input('routes._ids', ['options' => $routes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
