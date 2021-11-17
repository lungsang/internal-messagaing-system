@foreach($thread->messages as $message)
<tr class="{{ $thread->isUnread(Auth::id()) ? 'unread' : 'read' }}">
    <td class="action"><input type="checkbox" /></td>
    <td class="action" ><i class="far fa-star"></i></td>
    <td class="action" ><i class="far fa-bookmark"></i></td>
    <td class="name">
        <a href="{{ route('messages.show', $thread) }}" class="text-dark">
            {{ $message->user_id == auth()->id() ? 'Me' : $message->user->name }} 
        </a>
    </td>
    <td class="subject">
        <a href="{{ route('messages.show', $thread) }}" class="text-dark">
            {{ $thread->subject }} -
            <span class="text-secondary font-weight-normal"> 
                {{ Illuminate\Support\Str::limit(strip_tags($message->body),69) }}
            </span>
        </a>
    </td>
    
    <td class="time" style="">{{ $message->created_at->diffForHumans() }}</td>
     <td class="action">
        <form action="{{ route('messages.destroy', $thread) }}" method="POST">
            @csrf
            @method('DELETE')

           <button type="submit" class="btn btn-link text-danger p-0">
                <i class="far fa-trash-alt"></i>
            </button>
        </form>
    </td>
</tr>
@endforeach