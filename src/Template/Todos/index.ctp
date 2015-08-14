<!-- File: src/Template/Todos/index.ctp -->

<h1>To-Do List</h1>
<?= $this->Html->link('Add a To-Do Item', ['action' => 'add']) ?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <?php foreach ($todos as $todo): ?>
    <tr>
        <td><?= $todo->todo_id ?></td>
        <td>
            <?= $this->Html->link($todo->title, ['action' => 'view', $todo->todo_id]) ?>
        </td>
        <td>
            <?= $todo->create_dt->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $todo->id],
                ['confirm' => 'Are you sure?'])
            ?>
            <?= $this->Html->link('Edit', ['action' => 'edit', $todo->todo_id]) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
