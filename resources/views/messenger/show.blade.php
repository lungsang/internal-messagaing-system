<x-main-layout>
     <div class="email-app mb-4">

        <!-------- Side nav for messages -------->
        @include('messenger.partials.navigation')

        
        <main class="message vh-100">
            <!------------- Toolbar of messages ------------>
            @livewire('message.toolbar')

            <!------------- Message Show ------------------->
            <div class="details">
                <div class="title h4 ">{{ $thread->subject }}</div>
                @foreach ($thread->messages as $message)
                    <div class="header d-flex justify-content-between"> 
                        <div class='d-flex'>
                            <img class="avatar rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                            <div class="text-dark">
                                <div class="from">
                                    {{ $message->user->name }}
                                    <span class="font-weight-normal">&lt{{ $message->user->email }}&gt
                                    <br>
                                    to @foreach($message->recipients as $recipient)
                                    {{ $recipient->user->name}}
                                    @endforeach
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex">
                            <div class="date">
                                {{ $message->created_at->diffForHumans() }}
                            </div>
                            <div>
                                <button type="button" class="btn btn-link text-dark pt-0">
                                    <span class="fa fa-share "></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="@if(!$loop->last)content @endif">
                        {!! $message->body !!}
                    </div>
                @endforeach

                <form action="{{ route('messages.update', $thread) }}" method="post" class="">
                    @csrf
                    @method('PUT')

                    <!-- Message Form Input -->
                    <div class="mt-4">
                        <textarea placeholder="Click here to reply" name="message" rows="10" id="editor"
                            class=" ">{{ old('message') }}</textarea>
                    </div>

                    <!-- Submit Form Input -->
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Reply</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
    @include('components.ckeditor')
</x-main-layout>