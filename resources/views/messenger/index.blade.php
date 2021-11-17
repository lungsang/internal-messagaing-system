<x-main-layout>
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{$message}}
        </div>
    @endif
    
    @livewire('message.index',['type'=> request()->get('type') ?? $type])
    
</x-main-layout>
