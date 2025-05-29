<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <header class="bg-gray-800 text-white p-4">
        <h1 class="text-2xl font-bold">Task Manager</h1>
        <p class="mt-2">Manage your tasks efficiently.</p>
    </header>
    @if(session()->has('message'))
        <div class="bg-green-500 text-white p-4 mt-4 rounded">
            {{ session('message') }}
        </div>
    @endif
    <form wire:submit.prevent="addTask" class="mt-4">
        <input type="text" wire:model="title" placeholder="Add a new task..." class="border p-2 w-full">
        <button type="submit" class="bg-blue-500 text-white p-2 mt-2">Add Task</button>
    </form>

    @livewire('counter')
    @livewire("user-profile", ['userId' => 1, 'defaultName' => 'John Doe'])
</div>