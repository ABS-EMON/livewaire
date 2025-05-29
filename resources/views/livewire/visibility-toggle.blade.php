<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <button wire:click="toggleVisibility" class="btn btn-primary">
        {{ $isVisible ? 'Hide' : 'Show' }} Content
    </button>
    <div class="mt-4">
        @if ($isVisible)
            <p>This is the content that can be toggled.</p>
        @else
            <p>The content is hidden.</p>
        @endif
    </div>
</div>