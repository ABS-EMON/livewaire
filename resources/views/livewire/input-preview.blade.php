<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <input type="text" wire:model.lazy="inputText" placeholder="Type something..." class="border p-2 w-full" />
    <p>
        <strong>Preview:</strong> {{ $inputText }}
    </p>
</div>