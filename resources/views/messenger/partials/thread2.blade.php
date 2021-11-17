 <tr class="{{ $message->thread->isUnread(Auth::id()) ? 'unread' : 'read' }}">
    <td class="action">
        <input type="checkbox" value="{{ $message->id }}" wire:model="selected" class="h-4 w-4 text-gray-700 border rounded">
    </td>
    <td class="action" ><i class="far fa-star"></i></td>
    <td class="action" ><i class="far fa-bookmark"></i></td>
    <td class="name">
        <a href="{{ route('messages.show', $message->thread) }}" class="text-dark">
            @if($type=='inbox')
                {{ $message->user->name }} 
            @elseif($type=='sent')
                To:
                @foreach($message->recipients as $recipient)
                    {{$recipient->user->name }}
                @endforeach
            @endif
        </a>
    </td>
    <td class="subject">
        <a href="{{ route('messages.show', $message->thread) }}" class="text-dark">
            {{ $message->thread->subject }} -
            <span class="text-secondary font-weight-normal"> 
                {{ Illuminate\Support\Str::limit(strip_tags($message->body),72) }}
            </span>
        </a>
    </td>
    
    <td class="time" style="">{{ $message->created_at->diffForHumans() }}</td>
     <td class="action">
        <form action="{{ route('messages.destroy', $message->thread) }}" method="POST">
            @csrf
            @method('DELETE')

           <button type="submit" class="btn btn-link text-danger p-0">
                <i class="far fa-trash-alt"></i>
            </button>
        </form>
    </td>
</tr>
