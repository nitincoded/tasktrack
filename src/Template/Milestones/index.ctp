<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Milestone'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="milestones index large-9 medium-8 columns content">
    <h3><?= __('Milestones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('is_active') ?></th>
                <th><?= $this->Paginator->sort('project_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($milestones as $milestone): ?>
            <tr>
                <td><?= $this->Number->format($milestone->id) ?></td>
                <td><?= h($milestone->name) ?></td>
                <td><?= h($milestone->is_active) ?></td>
                <td><?= $milestone->has('project') ? $this->Html->link($milestone->project->name, ['controller' => 'Projects', 'action' => 'view', $milestone->project->id]) : '' ?></td>
                <td><?= h($milestone->created) ?></td>
                <td><?= h($milestone->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $milestone->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $milestone->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $milestone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $milestone->id)]) ?>
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
