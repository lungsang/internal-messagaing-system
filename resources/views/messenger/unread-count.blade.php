<?php $count = Auth::user()->newThreadsCount(); ?>

@if ($count > 0)
    <span class="badge badge-info">{{ $count }}</span>
@endif
