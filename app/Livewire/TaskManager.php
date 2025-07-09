<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TaskManager extends Component
{
    public $title;
    public $message;
    public $tasks;

    public $editingTaskId = null;
    public $editingTitle = '';
    public $editingMessage = '';

    protected $rules = [
        'title' => 'required|string|max:255',
        'message' => 'nullable|string',
    ];

    public function mount()
    {
        $this->loadTasks();
    }

    public function loadTasks()
    {
        $this->tasks = Task::where('user_id', Auth::id())->latest()->get();
    }

    public function addTask()
    {
        $this->validate();

        Task::create([
            'title' => $this->title,
            'message' => $this->message,
            'completed' => false,
            'user_id' => Auth::id(),
        ]);

        $this->title = '';
        $this->message = '';
        session()->flash('message', 'Task added successfully!');
        $this->loadTasks();
    }

    public function editTask($id)
    {
        $task = Task::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $this->editingTaskId = $task->id;
        $this->editingTitle = $task->title;
        $this->editingMessage = $task->message;
    }

    public function updateTask()
    {
        $this->validate([
            'editingTitle' => 'required|string|max:255',
            'editingMessage' => 'nullable|string',
        ]);

        Task::where('id', $this->editingTaskId)
            ->where('user_id', Auth::id())
            ->update([
                'title' => $this->editingTitle,
                'message' => $this->editingMessage,
            ]);

        session()->flash('message', 'Task updated successfully!');
        $this->cancelEdit();
        $this->loadTasks();
    }

    public function cancelEdit()
    {
        $this->editingTaskId = null;
        $this->editingTitle = '';
        $this->editingMessage = '';
    }

    public function deleteTask($id)
    {
        Task::where('id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        session()->flash('message', 'Task deleted permanently!');
        $this->loadTasks();
    }

    public function render()
    {
        return view('livewire.task-manager');
    }
}
