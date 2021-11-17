 <div class="email-app mb-4">
    <!-------- Side nav for messages -------->
    @include('messenger.partials.navigation')

    <main class="message vh-100">
        
        <div class="row">
            <!------------- Toolbar of messages ------------>
            <div class="col-4">
                @livewire('message.toolbar',['ids'=>$messages->pluck('id')->toArray()])
            </div>

            <div class="col-4">
            </div>
            <!------------- Search bar and pagination ------------>
            <div class="col-4">

                {{ $type  != 'trash' ? $messages->links() : ''}}

                <div class="float-right">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    </form>
                </div>
            </div>
        </div>
        
        <!-------------- Content Display ---------------------->
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    @if($type === 'trash')
                        @foreach($trashed as $thread)
                            @include('messenger.partials.trash',compact('thread'))
                        @endforeach
                    @else
                        @foreach($messages as $message)
                            @include('messenger.partials.thread2',compact('message'))
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

    </main>
</div>