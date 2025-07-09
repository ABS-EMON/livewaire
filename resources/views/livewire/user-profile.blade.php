<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <header class="bg-gray-800 text-white p-4">
        <h1 class="text-2xl font-bold">Welcome</h1>
        <p class="mt-2">{{$userName}}</p>
        @if($userId)
            <p class="mt-2">User ID: {{$userId}}</p>
        @endif
    </header>

</div>