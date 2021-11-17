<div class="toolbar ">
    <div class="btn-group">
        <button type="button" class="btn btn-light">
            <input type="checkbox" wire:click="selectAll" {{ $this->selectedCount ? 'checked' : ''}}/>
        </button>
        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"></button>
        <div class="dropdown-menu">
            <button class="btn btn-link text-dark dropdown-item" wire:click="selectAll">All</button>
             <button class="btn btn-link text-dark dropdown-item" wire:click="selectNone">None</button>
            <a class="dropdown-item" href="#">Unread</a>
            <a class="dropdown-item" href="#">Read</a>
        </div>
    </div>  

    <button type="button" class="btn btn-light">
        <i class="fas fa-redo"></i>
    </button>

    <!---- Show these toolbars only if any message is selected ------->
    @if($this->selectedCount)
        <button type="button" class="btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Delete">
            <span class="fas fa-share"></span>
        </button>

        <button type="button" class="btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Delete">
            <span class="fa fa-trash-alt"></span>
        </button>
        
        <div class="btn-group">
            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                <span class="fa fa-tags"></span>
                <span class="caret"></span>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Add label <span class="badge badge-danger"> Home</span></a>
                <a class="dropdown-item" href="#">Add label <span class="badge badge-info"> Job</span></a>
                <a class="dropdown-item" href="#">Add label <span class="badge badge-success"> Clients</span></a>
                <a class="dropdown-item" href="#">Add label <span class="badge badge-warning"> News</span></a>
            </div>
        </div>

    @endif
</div>