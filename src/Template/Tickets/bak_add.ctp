<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tickets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sites'), ['controller' => 'Sites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Site'), ['controller' => 'Sites', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Milestones'), ['controller' => 'Milestones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Milestone'), ['controller' => 'Milestones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tickets form large-9 medium-8 columns content">
    <?= $this->Form->create($ticket) ?>
    <fieldset>
        <legend><?= __('Add Ticket') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            echo $this->Form->input('type_id', ['options' => $types]);
            echo $this->Form->input('project_id', ['options' => $projects, 'empty' => true]);
            echo $this->Form->input('site_id', ['options' => $sites, 'empty' => true]);
            echo $this->Form->input('status_id', ['options' => $statuses]);
            echo $this->Form->input('milestone_id', ['options' => $milestones, 'empty' => true]);

	   $types_full_json = json_encode($types_full);
	   $types_handling_script = <<<EOSCRIPT1
<!-- Type dropdown handling -->
<script>
var types_full_obj = $types_full_json;

function check_if_site_or_project() {
  aid = document.getElementById('type-id').value;
  for (i=0; i<types_full_obj.length; i++) {
    if (types_full_obj[i].id==aid) {
      if (types_full_obj[i].is_site_needed) {
        document.getElementById('site-id').parentNode.style.display = 'block';
        document.getElementById('project-id').parentNode.style.display = 'none';
        document.getElementById('milestone-id').parentNode.style.display = 'none';
      } else if (types_full_obj[i].is_project_needed) {
        document.getElementById('site-id').parentNode.style.display = 'none';
        document.getElementById('project-id').parentNode.style.display = 'block';
        document.getElementById('milestone-id').parentNode.style.display = 'block';
      }
    }
  }
}

document.getElementById('site-id').parentNode.style.display = 'none';
document.getElementById('project-id').parentNode.style.display = 'block';
document.getElementById('milestone-id').parentNode.style.display = 'block';

document.getElementById('type-id').addEventListener('change', check_if_site_or_project);
</script>
EOSCRIPT1;
	    echo $types_handling_script;
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
