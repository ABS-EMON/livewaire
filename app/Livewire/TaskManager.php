<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskManager extends Component
{
    public $title;
    public $tasks;

   protected $rules = [
        'title' => 'required|string|max:255|string',
    ];
    public function mount()
    {
        $this->tasks = \App\Models\Task::all();
    }
    
    public function addTask()
    {
        
        $this->validate();
        Task::create(['title' => $this->title, 'completed' => false]);
        $this->tasks = Task::all();
        $this->title = '';
        Session()->flash('message', 'Task added successfully!');
    }

    public function deleteTask($id)
    {
        Task::find($id)->delete();
        $this->tasks = Task::all();
        Session()->flash('message', 'Task deleted successfully!');
    
    }





    public function render()
    {
        return view('livewire.task-manager');
    }
}
