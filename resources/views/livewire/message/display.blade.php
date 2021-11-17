<div class="table-responsive">
    <table class="table">
        <tbody>
            @foreach($messages as $message)
                @include('messenger.partials.thread2',compact('message'))
            @endforeach
        </tbody>
    </table>
</div>
