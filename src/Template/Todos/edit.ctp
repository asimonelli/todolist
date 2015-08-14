<!-- File: src/Template/Todos/edit.ctp -->

<h1>Edit To-Do Items</h1>
<?php
    echo $this->Form->create($todo);
    echo $this->Form->input('title');
    echo $this->Form->input('detail', ['rows' => '3']);
    echo $this->Form->button(__('Update To-Do Item'));
    echo $this->Form->end();
?>