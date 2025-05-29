<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <button wire:click="increment" class="bg-blue-500 text-white p-2 mt-2">Increment</button>

    <button wire:click="decrement" class="bg-red-500 text-white p-2 mt-2">Decrement</button>

    <span>
        {{ $count }}
    </span>
</div>