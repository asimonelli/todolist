<?php
// src/Controller/TodosController.php

namespace App\Controller;

class TodosController extends AppController
{
//    public function beforeRender(\Cake\Event\Event $event)
//    {
//        $this->getView()->theme = 'Modern';
//    }
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index()
    {
        $todos = $this->Todos->find('all');
        $this->set(compact('todos'));
    }

    public function view($todo_id = null)
    {
        $todo = $this->Todos->get($todo_id);
        $this->set(compact('todo'));
    }

    public function add()
    {
        $todo = $this->Todos->newEntity();
        if ($this->request->is('post')) {
            $todo = $this->Todos->patchEntity($todo, $this->request->data);
            if ($this->Todos->save($todo)) {
                $this->Flash->success(__('Your to-do item has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add the to-do item.'));
        }
        $this->set('todo', $todo);
    }
    public function edit($todo_id = null)
    {
        $todo = $this->Todos->get($todo_id);
        if ($this->request->is(['post', 'put'])) {
            $this->Todos->patchEntity($todo, $this->request->data);
            if ($this->Todos->save($todo)) {
                $this->Flash->success(__('Your to-do item has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your todo.'));
        }

        $this->set('todo', $todo);
    }
    public function delete($todo_id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $todo = $this->Todos->get($todo_id);
        if ($this->Todos->delete($todo)) {
            $this->Flash->success(__('The to-do item with id: {0} has been deleted.', h($todo_id)));
            return $this->redirect(['action' => 'index']);
        }
    }
}
?>