<!-- File: src/Template/Articles/add.ctp -->

<h1>Add a To-Do Item</h1>
<?php
    echo $this->Form->create($todo);
    echo $this->Form->input('title');
    echo $this->Form->input('detail', ['rows' => '3']);
    echo $this->Form->button(__('Add Item'));
    echo $this->Form->end();
?>