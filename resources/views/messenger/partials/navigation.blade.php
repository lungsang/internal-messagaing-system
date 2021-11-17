 <nav>
    <a href="{{ route('messages.create') }}" class="btn btn-primary btn-block">Compose</a>
    <ul class="nav">
        <li class="nav-item {{ isset($type) && $type === 'inbox' ? 'active' : '' }}">
            <a class="nav-link" href="{{route('messages')}}?type=inbox"><i class="fa fa-inbox"></i> Inbox @include('messenger.unread-count')</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-star"></i> Stared</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-bookmark"></i> Important</a>
        </li>
        <li class="nav-item {{ isset($type) && $type  === 'sent' ? 'active' : '' }}">
            <a class="nav-link" href="{{route('messages')}}?type=sent" wire:click="$set('type','sent')"><i class="fas fa-paper-plane"></i> Sent</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#draft"><i class="fas fa-file"></i> Draft</a>
        </li>
        <li class="nav-item {{ isset($type) && $type  === 'trash' ? 'active' : '' }}">
            <a class="nav-link" href="{{route('messages')}}?type=trash"><i class="fa fa-trash-alt"></i> Trash</a>
        </li>
    </ul>

    <div class="lead mt-5" style="font-size:1rem"> Labels </div>
    <ul class="nav">
    
    </ul>


</nav>

 