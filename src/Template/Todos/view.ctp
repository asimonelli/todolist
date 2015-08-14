<!-- File: src/Template/Todos/view.ctp -->

<h1><?= h($todo->title) ?></h1>
<strong>To-Do Detail</strong>
<p><?= h($todo->detail) ?></p>
<p><small>Created: <?= $todo->create_dt->format(DATE_RFC850) ?></small></p>