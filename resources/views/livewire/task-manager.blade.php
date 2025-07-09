<div>
    <header class="bg-gray-800 text-white p-4">
        <h1 class="text-2xl font-bold">Task Manager</h1>
        <p class="mt-2">Manage your tasks efficiently.</p>
    </header>

    @if(session()->has('message'))
        <div class="bg-green-500 text-white p-4 mt-4 rounded">
            {{ session('message') }}
        </div>
    @endif

    {{-- Task creation form --}}
    <form wire:submit.prevent="addTask" class="mt-4 space-y-2">
        <input type="text" wire:model="title" placeholder="Task Title" class="border p-2 w-full">
        <textarea wire:model="message" placeholder="Task Description..." class="border p-2 w-full"></textarea>
        <button type="submit" class="bg-blue-500 text-white p-2 mt-2">Save Task</button>
    </form>

    <div class="mt-6">
        <h2 class="text-xl font-semibold mb-2">Your Tasks</h2>
        <ul class="divide-y">
            @forelse($tasks as $task)
                <li class="p-4 border rounded mb-2 bg-white">
                    @if($editingTaskId === $task->id)
                        <div class="space-y-2">
                            <input type="text" wire:model="editingTitle" class="border p-2 w-full" placeholder="Edit title">
                            <textarea wire:model="editingMessage" class="border p-2 w-full" placeholder="Edit message"></textarea>
                            <div class="flex gap-2 mt-2">
                                <button wire:click="updateTask" class="bg-green-500 text-white px-3 py-1 rounded">Update</button>
                                <button wire:click="cancelEdit" class="bg-gray-400 text-white px-3 py-1 rounded">Cancel</button>
                            </div>
                        </div>
                    @else
                        <div class="mb-1">
                            <strong>{{ $task->title }}</strong>
                        </div>
                        <div class="text-gray-700 mb-2">{{ $task->message }}</div>
                        <div class="flex gap-3 text-sm">
                            <button wire:click="editTask({{ $task->id }})" class="text-blue-600 hover:underline">Edit</button>
                            <button wire:click="deleteTask({{ $task->id }})" class="text-red-600 hover:underline">Delete</button>
                        </div>
                    @endif
                </li>
            @empty
                <li class="text-gray-500 p-2">No tasks found.</li>
            @endforelse
        </ul>
    </div>

    {{-- Optional Extras --}}
    @livewire('counter')
    @auth
    @livewire('user-profile', [
        'userId' => auth()->id(),
        'defaultName' => auth()->user()->name
    ])
    <footer class="bg-gray-100 text-gray-700 p-4 mt-8 text-sm text-center border-t">
        Logged in as <strong>{{ auth()->user()->name }}</strong> (ID: {{ auth()->id() }})
    </footer>
    @endauth



</div>
